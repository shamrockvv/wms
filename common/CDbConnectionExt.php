<?php
/**
 * 实现数据库的主从分离，该类会维护多个数据库的配置：一个主数据库配置，多个从数据库的配置。
 * 具体使用主数据库还是从数据库，使用如下规则：
 * 1、CDbCommandExt的prepare方法会根据sql语句是读还是写，来调用CDbConnectionExt的getPdoInstance方法，来获取主数据库或者从数据库链接，默认使用主数据库
 * 2、如果当前处于一个事务中，那么无视第一条规则，在事务结束前全部使用主数据库
 * 3、如果从数据库的配置为空，则使用主数据库
 */
class CDbConnectionExt extends CDbConnection {
	/**
	 * @var string The Data Source Name, or DSN, contains the information required to connect to the database.
	 * @see http://www.php.net/m...O-construct.php
	 */
	public $connectionString;
	/**
	 * @var string the username for establishing DB connection. Defaults to empty string.
	 */
	public $username = '';
	/**
	 * @var string the password for establishing DB connection. Defaults to empty string.
	 */
	public $password = '';

	/**
	 * @var array 从数据库配置数组，例如：
	 * array(
	 * array('connectionString'=>'mysql:host=192.168.1.100;dbname=McAm;port=8001', 'username'=>'mcam', 'password'=>'123456'),
	 * array('connectionString'=>'mysql:host=192.168.1.101;dbname=McAm;port=8001', 'username'=>'mcam', 'password'=>'123456'),
	 * array('connectionString'=>'mysql:host=192.168.1.102;dbname=McAm;port=8001', 'username'=>'mcam', 'password'=>'123456'),
	 * )
	 */
	public $slaveConfig = array();

	/**
	 * @var integer number of seconds that table metadata can remain valid in cache.
	 * Use 0 or negative value to indicate not caching schema.
	 * If greater than 0 and the primary cache is enabled, the table metadata will be cached.
	 * @see schemaCachingExclude
	 */
	public $schemaCachingDuration = 0;
	/**
	 * @var array list of tables whose metadata should NOT be cached. Defaults to empty array.
	 * @see schemaCachingDuration
	 */
	public $schemaCachingExclude = array();
	/**
	 * @var string the ID of the cache application component that is used to cache the table metadata.
	 * Defaults to 'cache' which refers to the primary cache application component.
	 * Set this property to false if you want to disable caching table metadata.
	 * @since 1.0.10
	 */
	public $schemaCacheID = 'cache';
	/**
	 * @var boolean whether the database connection should be automatically established
	 * the component is being initialized. Defaults to true. Note, this property is only
	 * effective when the CDbConnection object is used as an application component.
	 */
	public $autoConnect = true;
	/**
	 * @var string the charset used for database connection. The property is only used
	 * for MySQL and PostgreSQL databases. Defaults to null, meaning using default charset
	 * as specified by the database.
	 */
	public $charset;
	/**
	 * @var boolean whether to turn on prepare emulation. Defaults to false, meaning PDO
	 * will use the native prepare support if available. For some databases (such as MySQL),
	 * this may need to be set true so that PDO can emulate the prepare support to bypass
	 * the buggy native prepare support. Note, this property is only effective for PHP 5.1.3 or above.
	 */
	public $emulatePrepare = false;
	/**
	 * @var boolean whether to log the values that are bound to a prepare SQL statement.
	 * Defaults to false. During development, you may consider setting this property to true
	 * so that parameter values bound to SQL statements are logged for debugging purpose.
	 * You should be aware that logging parameter values could be expensive and have significant
	 * impact on the performance of your application.
	 * @since 1.0.5
	 */
	public $enableParamLogging = false;
	/**
	 * @var boolean whether to enable profiling the SQL statements being executed.
	 * Defaults to false. This should be mainly enabled and used during development
	 * to find out the bottleneck of SQL executions.
	 * @since 1.0.6
	 */
	public $enableProfiling = false;
	/**
	 * @var string the default prefix for table names. Defaults to null, meaning no table prefix.
	 * By setting this property, any token like '{{tableName}}' in {@link CDbCommand::text} will
	 * be replaced by 'prefixTableName', where 'prefix' refers to this property value.
	 * @since 1.1.0
	 */
	public $tablePrefix;
	/**
	 * @var array list of SQL statements that should be executed right after the DB connection is established.
	 * @since 1.1.1
	 */
	public $initSQLs;

	private $_attributes = array();
	private $_active = false;
	private $_pdo;
	private $_transaction;
	private $_schema;

	//主数据库、从数据库链接
	private $_pdoMaster = null;
	private $_pdoSlave = null;

	/**
	 * Constructor.
	 * Note, the DB connection is not established when this connection
	 * instance is created. Set {@link setActive active} property to true
	 * to establish the connection.
	 * @param string The Data Source Name, or DSN, contains the information required to connect to the database.
	 * @param string The user name for the DSN string.
	 * @param string The password for the DSN string.
	 * @see http://www.php.net/m...O-construct.php
	 */
	public function __construct($dsn = '', $username = '', $password = '', $slaveConfig = array()) {
		$this->connectionString = $dsn;
		$this->username = $username;
		$this->password = $password;

		//设置从数据库配置
		$this->slaveConfig = $slaveConfig;
	}

	/**
	 * Close the connection when serializing.
	 */
	public function __sleep() {
		$this->close();
		return array_keys(get_object_vars($this));
	}

	/**
	 * @return array list of available PDO drivers
	 * @see http://www.php.net/m...ableDrivers.php
	 */
	public static function getAvailableDrivers() {
		return PDO::getAvailableDrivers();
	}

	/**
	 * Initializes the component.
	 * This method is required by {@link IApplicationComponent} and is invoked by application
	 * when the CDbConnection is used as an application component.
	 * If you override this method, make sure to call the parent implementation
	 * so that the component can be marked as initialized.
	 */
	public function init() {
		parent::init();
		if ($this->autoConnect)
			$this->setActive(true);
	}

	/**
	 * @return boolean whether the DB connection is established
	 */
	public function getActive() {
		return $this->_active;
	}

	/**
	 * Open or close the DB connection.
	 * @param boolean whether to open or close DB connection
	 * @throws CException if connection fails
	 */
	public function setActive($value) {
		//不在这边创建数据库链接，在getPdoInstance方法中创建，即在真正需要的时候才创建
		$this->_active = true;
		/*if($value!=$this->_active)
{
if($value)
$this->open();
else
$this->close();
}*/
	}

	/**
	 * Opens DB connection if it is currently not
	 * @throws CException if connection fails
	 */
	protected function open($connectionString = '', $username = '', $password = '') {
		//如果没有输入数据库配置，则使用主数据库配置
		$connectionString = $connectionString ? $connectionString : $this->connectionString;
		$username = $username ? $username : $this->username;
		$password = $password ? $password : $this->password;

		if (empty ($connectionString))
			throw new CDbException (Yii::t('yii', 'CDbConnection.connectionString cannot be empty.'));

		//本次创建出来的pdo链接
		$pdo = null;
		try {
			Yii::trace('Opening DB connection', 'system.db.CDbConnection');
			$pdo = $this->createPdoInstance($connectionString, $username, $password);
			$this->initConnection($pdo);
		} catch (PDOException $e) {
			if (YII_DEBUG) {
				throw new CDbException (Yii::t('yii', 'CDbConnection failed to open the DB connection: {error}', array('{error}' => $e->getMessage())));
			} else {
				Yii::log($e->getMessage(), CLogger::LEVEL_ERROR, 'exception.CDbException');
				throw new CDbException (Yii::t('yii', 'CDbConnection failed to open the DB connection.'));
			}
		}
		//返回创建的pdo链接
		return $pdo;
	}

	/**
	 * Closes the currently active DB connection.
	 * It does nothing if the connection is already closed.
	 */
	protected function close() {
		Yii::trace('Closing DB connection', 'system.db.CDbConnection');
		$this->_pdo = null;
		$this->_active = false;
		$this->_schema = null;

		//删除主数据库链接、从数据库链接
		$this->_pdoMaster = null;
		$this->_pdoSlave = null;
	}

	/**
	 * Creates the PDO instance.
	 * When some functionalities are missing in the pdo driver, we may use
	 * an adapter class to provides them.
	 * @return PDO the pdo instance
	 * @since 1.0.4
	 */
	protected function createPdoInstance($connectionString, $username, $password) {
		$pdoClass = 'PDO';
		if (($pos = strpos($connectionString, ':')) !== false) {
			$driver = strtolower(substr($this->connectionString, 0, $pos));
			if ($driver === 'mssql' || $driver === 'dblib')
				$pdoClass = 'CMssqlPdoAdapter';
		}
		return new $pdoClass ($connectionString, $username, $password, $this->_attributes);
	}

	/**
	 * Initializes the open db connection.
	 * This method is invoked right after the db connection is established.
	 * The default implementation is to set the charset for MySQL and PostgreSQL database connections.
	 * @param PDO the PDO instance
	 */
	protected function initConnection($pdo) {
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if ($this->emulatePrepare && constant('PDO::ATTR_EMULATE_PREPARES'))
			$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
		if ($this->charset !== null) {
			if (strcasecmp($pdo->getAttribute(PDO::ATTR_DRIVER_NAME), 'sqlite'))
				$pdo->exec('SET NAMES ' . $pdo->quote($this->charset));
		}
		if ($this->initSQLs !== null) {
			foreach ($this->initSQLs as $sql)
				$pdo->exec($sql);
		}
	}

	/**
	 * 真正的创建pdo链接
	 * @return PDO the PDO instance, null if the connection is not established yet
	 */
//	public function getPdoInstance($useSlave = false) {
//		//满足这两种情况才使用从库：1、存在从库；2、当前不处于一个事务中
//		if ($useSlave && count ( $this->slaveConfig ) && (! $this->_transaction || ! $this->_transaction->getActive ())) {
//			if ($this->_pdoSlave)
//				$this->_pdo = $this->_pdoSlave;
//			else {
//				//随机选择一个从库
//				$randIndex = array_rand ( $this->slaveConfig );
//				list ( $connectionString, $username, $password ) = $this->slaveConfig [$randIndex];
//				$this->_pdo = $this->_pdoSlave = $this->open ( $connectionString, $username, $password );
//			}
//		} else {
//			if ($this->_pdoMaster)
//				$this->_pdo = $this->_pdoMaster;
//			else
//				//创建主数据库链接
//				$this->_pdo = $this->_pdoMaster = $this->open ();
//		}
//		return $this->_pdo;
//	}

	public function getPdoInstance($useSlave = false) {
		$flag = false;
		//满足这两种情况才使用从库：1、存在从库；2、当前不处于一个事务中
		if ($useSlave && count($this->slaveConfig) && (!$this->_transaction || !$this->_transaction->getActive())) {
			if ($this->_pdoSlave)
				$this->_pdo = $this->_pdoSlave;
			else {
				$this->_pdo = $this->selectAvilableSlave($flag);
			}
		} else {
			if ($this->_pdoMaster)
				$this->_pdo = $this->_pdoMaster;
			else
				//创建主数据库链接
			$this->_pdo = $this->_pdoMaster = $this->open();
		}
		return $this->_pdo;
	}

	//判断当前的slave库是否可以连接
	public function selectAvilableSlave($flag) {
		$i = 0;
		while ($i < count($this->slaveConfig) && $flag === false) {
			//$randIndex = $this->slaveConfig [$i];
			$randIndex = array_rand($this->slaveConfig);
			$config = array_values($this->slaveConfig [$randIndex]);
			list ($connectionString, $username, $password) = $config;
			$this->_pdoSlave = $this->open($connectionString, $username, $password);
			if (!empty ($this->_pdoSlave)) {
				$flag = true;
			}
			$i++;
		}
		return $this->_pdoSlave;
	}

	/**
	 * Creates a command for execution.
	 * @param string SQL statement associated with the new command.
	 * @return CDbCommand the DB command
	 * @throws CException if the connection is not active
	 */
	public function createCommand($sql = null) {
		if ($this->getActive()) {
			//需要使用CDbCommandExt类，因为该类可以获得sql的读写状态，从而可以选择主从数据库
			return new CDbCommandExt ($this, $sql);

			//return new CDbCommand($this,$sql);
		} else
			throw new CDbException (Yii::t('yii', 'CDbConnection is inactive and cannot perform any DB operations.'));
	}

	/**
	 * @return CDbTransaction the currently active transaction. Null if no active transaction.
	 */
	public function getCurrentTransaction() {
		if ($this->_transaction !== null) {
			if ($this->_transaction->getActive())
				return $this->_transaction;
		}
		return null;
	}

	/**
	 * Starts a transaction.
	 * @return CDbTransaction the transaction initiated
	 * @throws CException if the connection is not active
	 */
	public function beginTransaction() {
		if ($this->getActive()) {
			//获得主数据库，将当前的pdo链接设置为主数据库
			$this->_pdo = $this->getPdoInstance();

			if ($this->_pdo) {
				$this->_pdo->beginTransaction();
				return $this->_transaction = new CDbTransaction ($this);
			} else
				throw new CDbException (Yii::t('yii', 'CDbConnection is inactive and cannot perform any DB operations.'));
		} else
			throw new CDbException (Yii::t('yii', 'CDbConnection is inactive and cannot perform any DB operations.'));
	}

	/**
	 * @return CDbSchema the database schema for the current connection
	 * @throws CException if the connection is not active yet
	 */
	public function getSchema() {
		if ($this->_schema !== null)
			return $this->_schema;
		else {
			if (!$this->getActive())
				throw new CDbException (Yii::t('yii', 'CDbConnection is inactive and cannot perform any DB operations.'));
			$driver = $this->getDriverName();
			switch (strtolower($driver)) {
				case 'pgsql' : // PostgreSQL
					return $this->_schema = new CPgsqlSchema ($this);
				case 'mysqli' : // MySQL
				case 'mysql' :
					return $this->_schema = new CMysqlSchema ($this);
				case 'sqlite' : // sqlite 3
				case 'sqlite2' : // sqlite 2
					return $this->_schema = new CSqliteSchema ($this);
				case 'mssql' : // Mssql driver on windows hosts
				case 'dblib' : // dblib drivers on linux (and maybe others os) hosts
					return $this->_schema = new CMssqlSchema ($this);
				case 'oci' : // Oracle driver
					return $this->_schema = new COciSchema ($this);
				case 'ibm' :
				default :
					throw new CDbException (Yii::t('yii', 'CDbConnection does not support reading schema for {driver} database.', array('{driver}' => $driver)));
			}
		}
	}

	/**
	 * Returns the SQL command builder for the current DB connection.
	 * @return CDbCommandBuilder the command builder
	 * @since 1.0.4
	 */
	public function getCommandBuilder() {
		return $this->getSchema()->getCommandBuilder();
	}

	/**
	 * Returns the ID of the last inserted row or sequence value.
	 * @param string name of the sequence object (required by some DBMS)
	 * @return string the row ID of the last row inserted, or the last value retrieved from the sequence object
	 * @see http://www.php.net/m...astInsertId.php
	 */
	public function getLastInsertID($sequenceName = '') {
		//必须使用主数据库链接
		if ($this->getActive() && $this->_pdoMaster)
			//return $this->_pdo->lastInsertId($sequenceName);
		return $this->_pdoMaster->lastInsertId($sequenceName);
		else
			throw new CDbException (Yii::t('yii', 'CDbConnection is inactive and cannot perform any DB operations.'));
	}

	/**
	 * Quotes a string value for use in a query.
	 * @param string string to be quoted
	 * @return string the properly quoted string
	 * @see http://www.php.net/m...n.PDO-quote.php
	 */
	public function quoteValue($str) {
		if ($this->getActive()) {
			//如果当前链接不存在，则创建一个与从数据库之间的链接
			if (!$this->_pdo)
				$this->_pdo = $this->getPdoInstance(true);

			//如果创建链接失败，抛出异常
			if (!$this->_pdo)
				throw new CDbException (Yii::t('yii', 'CDbConnection is inactive and cannot perform any DB operations.'));

			return $this->_pdo->quote($str);
		} else
			throw new CDbException (Yii::t('yii', 'CDbConnection is inactive and cannot perform any DB operations.'));
	}

	/**
	 * Quotes a table name for use in a query.
	 * @param string table name
	 * @return string the properly quoted table name
	 */
	public function quoteTableName($name) {
		return $this->getSchema()->quoteTableName($name);
	}

	/**
	 * Quotes a column name for use in a query.
	 * @param string column name
	 * @return string the properly quoted column name
	 */
	public function quoteColumnName($name) {
		return $this->getSchema()->quoteColumnName($name);
	}

	/**
	 * Determines the PDO type for the specified PHP type.
	 * @param string The PHP type (obtained by gettype() call).
	 * @return integer the corresponding PDO type
	 */
	public function getPdoType($type) {
		static $map = array(
			'boolean' => PDO::PARAM_BOOL,
			'integer' => PDO::PARAM_INT,
			'string' => PDO::PARAM_STR,
			'NULL' => PDO::PARAM_NULL
		);
		return isset ($map [$type]) ? $map [$type] : PDO::PARAM_STR;
	}

	/**
	 * @return mixed the case of the column names
	 * @see http://www.php.net/m...etattribute.php
	 */
	public function getColumnCase() {
		return $this->getAttribute(PDO::ATTR_CASE);
	}

	/**
	 * @param mixed the case of the column names
	 * @see http://www.php.net/m...etattribute.php
	 */
	public function setColumnCase($value) {
		$this->setAttribute(PDO::ATTR_CASE, $value);
	}

	/**
	 * @return mixed how the null and empty strings are converted
	 * @see http://www.php.net/m...etattribute.php
	 */
	public function getNullConversion() {
		return $this->getAttribute(PDO::ATTR_ORACLE_NULLS);
	}

	/**
	 * @param mixed how the null and empty strings are converted
	 * @see http://www.php.net/m...etattribute.php
	 */
	public function setNullConversion($value) {
		$this->setAttribute(PDO::ATTR_ORACLE_NULLS, $value);
	}

	/**
	 * @return boolean whether creating or updating a DB record will be automatically committed.
	 * Some DBMS (such as sqlite) may not support this feature.
	 */
	public function getAutoCommit() {
		return $this->getAttribute(PDO::ATTR_AUTOCOMMIT);
	}

	/**
	 * @param boolean whether creating or updating a DB record will be automatically committed.
	 * Some DBMS (such as sqlite) may not support this feature.
	 */
	public function setAutoCommit($value) {
		$this->setAttribute(PDO::ATTR_AUTOCOMMIT, $value);
	}

	/**
	 * @return boolean whether the connection is persistent or not
	 * Some DBMS (such as sqlite) may not support this feature.
	 */
	public function getPersistent() {
		return $this->getAttribute(PDO::ATTR_PERSISTENT);
	}

	/**
	 * @param boolean whether the connection is persistent or not
	 * Some DBMS (such as sqlite) may not support this feature.
	 */
	public function setPersistent($value) {
		return $this->setAttribute(PDO::ATTR_PERSISTENT, $value);
	}

	/**
	 * @return string name of the DB driver
	 */
	public function getDriverName() {
		return $this->getAttribute(PDO::ATTR_DRIVER_NAME);
	}

	/**
	 * @return string the version information of the DB driver
	 */
	public function getClientVersion() {
		return $this->getAttribute(PDO::ATTR_CLIENT_VERSION);
	}

	/**
	 * @return string the status of the connection
	 * Some DBMS (such as sqlite) may not support this feature.
	 */
	public function getConnectionStatus() {
		return $this->getAttribute(PDO::ATTR_CONNECTION_STATUS);
	}

	/**
	 * @return boolean whether the connection performs data prefetching
	 */
	public function getPrefetch() {
		return $this->getAttribute(PDO::ATTR_PREFETCH);
	}

	/**
	 * @return string the information of DBMS server
	 */
	public function getServerInfo() {
		return $this->getAttribute(PDO::ATTR_SERVER_INFO);
	}

	/**
	 * @return string the version information of DBMS server
	 */
	public function getServerVersion() {
		return $this->getAttribute(PDO::ATTR_SERVER_VERSION);
	}

	/**
	 * @return int timeout settings for the connection
	 */
	public function getTimeout() {
		return $this->getAttribute(PDO::ATTR_TIMEOUT);
	}

	/**
	 * Obtains a specific DB connection attribute information.
	 * @param int the attribute to be queried
	 * @return mixed the corresponding attribute information
	 * @see http://www.php.net/m...etAttribute.php
	 */
	public function getAttribute($name) {
		if ($this->getActive()) {
			//如果当前链接不存在，则创建一个与从数据库之间的链接
			if (!$this->_pdo)
				$this->_pdo = $this->getPdoInstance(true);

			//如果创建链接失败，抛出异常
			if (!$this->_pdo)
				throw new CDbException (Yii::t('yii', 'CDbConnection is inactive and cannot perform any DB operations.'));

			return $this->_pdo->getAttribute($name);
		} else
			throw new CDbException (Yii::t('yii', 'CDbConnection is inactive and cannot perform any DB operations.'));
	}

	/**
	 * Sets an attribute on the database connection.
	 * @param int the attribute to be set
	 * @param mixed the attribute value
	 * @see http://www.php.net/m...etAttribute.php
	 */
	public function setAttribute($name, $value) {
		if ($this->_pdo instanceof PDO)
			$this->_pdo->setAttribute($name, $value);
		/*else
$this->_attributes[$name]=$value;*/
		//记录设置数据库属性，在主库与从库之间切换时，数据库属性需要从新设置
		$this->_attributes [$name] = $value;
	}

	/**
	 * Returns the statistical results of SQL executions.
	 * The results returned include the number of SQL statements executed and
	 * the total time spent.
	 * In order to use this method, {@link enableProfiling} has to be set true.
	 * @return array the first element indicates the number of SQL statements executed,
	 * and the second element the total time spent in SQL execution.
	 * @since 1.0.6
	 */
	public function getStats() {
		$logger = Yii::getLogger();
		$timings = $logger->getProfilingResults(null, 'system.db.CDbCommand.query');
		$count = count($timings);
		$time = array_sum($timings);
		$timings = $logger->getProfilingResults(null, 'system.db.CDbCommand.execute');
		$count += count($timings);
		$time += array_sum($timings);
		return array($count, $time);
	}
}

?>