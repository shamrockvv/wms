<?php
/**
 * 通过sql来选择主库或者从库
 */
class CDbCommandExt extends CDbCommand {
	/**
	 * 修改父类的prepare成员函数
	 * 当创建一个PDOStatement对象的时候，根据sql是读还是写，来判断使用主数据库还是从数据库
	 */
	public function prepare() {
		if ($this->_statement == null) {
			try {
				$useSlave = $this->isReadSql($this->getText()); //如果是一条读语句，则使用从数据库
				$this->_statement = $this->getConnection()->getPdoInstance($useSlave)->prepare($this->getText());
				$this->_params = array();
			} catch (Exception $e) {
				Yii::log('Error in preparing SQL: ' . $this->getText(), CLogger::LEVEL_ERROR, 'system.db.CDbCommand');
				throw new CDbException (Yii::t('yii', 'CDbCommand failed to prepare the SQL statement: {error}', array('{error}' => $e->getMessage())));
			}
		}
	}

	/**
	 * 判断一个SQl语句是否为一条读取语句
	 * 以SELECT SHOW DESCRIBE DESC打头的语句认为是读语句
	 * @return boolean true/false
	 */
	private function isReadSql($sql) {
		static $readSqlPrefix = array('SELECT', 'SHOW', 'DESCRIBE', 'DESC');

		//去掉开头的无用的字符
		$sql = ltrim($sql);
		//如果是一个空查询，直接返回
		if (empty ($sql)) {
			return false;
		}
		//匹配各种情况
		foreach ($readSqlPrefix as $prefix) {
			$subStr = substr($sql, 0, strlen($prefix) + 1); //多取一个字符，验证这个字符是否为空格回车等
			$subStr = rtrim($subStr); //去掉末尾的空格回车等
			$subStr = strtoupper($subStr); //转化成大写
			if ($subStr === $prefix)
				return true;
		}
		return false;
	}

	///////////////////////////////////////////////////////////////////////////////////////////////////
	//因为子类不能调用父类的私有成员函数，所以将父类的成员函数和成员变量复制过来，以下是父类的成员函数和成员变量
	///////////////////////////////////////////////////////////////////////////////////////////////////


	private $_connection;
	private $_text = '';
	private $_statement = null;
	private $_params = array();

	/**
	 * Constructor.
	 * @param CDbConnection the database connection
	 * @param string the SQL statement to be executed
	 */
	public function __construct(CDbConnection $connection, $text) {
		$this->_connection = $connection;
		$this->setText($text);
	}

	/**
	 * Set the statement to null when serializing.
	 */
	public function __sleep() {
		$this->_statement = null;
		return array_keys(get_object_vars($this));
	}

	/**
	 * @return string the SQL statement to be executed
	 */
	public function getText() {
		return $this->_text;
	}

	/**
	 * Specifies the SQL statement to be executed.
	 * Any previous execution will be terminated or cancel.
	 * @param string the SQL statement to be executed
	 */
	public function setText($value) {
		if ($this->_connection->tablePrefix !== null)
			$this->_text = preg_replace('/{{(.*?)}}/', $this->_connection->tablePrefix . '\1', $value);
		else
			$this->_text = $value;
		$this->cancel();
	}

	/**
	 * @return CDbConnection the connection associated with this command
	 */
	public function getConnection() {
		return $this->_connection;
	}

	/**
	 * @return PDOStatement the underlying PDOStatement for this command
	 * It could be null if the statement is not prepared yet.
	 */
	public function getPdoStatement() {
		return $this->_statement;
	}

	/**
	 * Cancels the execution of the SQL statement.
	 */
	public function cancel() {
		$this->_statement = null;
	}

	/**
	 * Binds a parameter to the SQL statement to be executed.
	 * @param mixed Parameter identifier. For a prepared statement
	 * using named placeholders, this will be a parameter name of
	 * the form :name. For a prepared statement using question mark
	 * placeholders, this will be the 1-indexed position of the parameter.
	 * @param mixed Name of the PHP variable to bind to the SQL statement parameter
	 * @param int SQL data type of the parameter. If null, the type is determined by the PHP type of the value.
	 * @param int length of the data type
	 * @return CDbCommand the current command being executed (this is available since version 1.0.8)
	 * @see http://www.php.net/m...t-bindParam.php
	 */
	public function bindParam($name, &$value, $dataType = null, $length = null,$driverOptions=null) {
		$this->prepare();
		if ($dataType === null)
			$this->_statement->bindParam($name, $value, $this->_connection->getPdoType(gettype($value)));
		else if ($length === null)
			$this->_statement->bindParam($name, $value, $dataType);
		else
			$this->_statement->bindParam($name, $value, $dataType, $length);
		if ($this->_connection->enableParamLogging)
			$this->_params [$name] = $value;
		return $this;
	}

	/**
	 * Binds a value to a parameter.
	 * @param mixed Parameter identifier. For a prepared statement
	 * using named placeholders, this will be a parameter name of
	 * the form :name. For a prepared statement using question mark
	 * placeholders, this will be the 1-indexed position of the parameter.
	 * @param mixed The value to bind to the parameter
	 * @param int SQL data type of the parameter. If null, the type is determined by the PHP type of the value.
	 * @return CDbCommand the current command being executed (this is available since version 1.0.8)
	 * @see http://www.php.net/m...t-bindValue.php
	 */
	public function bindValue($name, $value, $dataType = null) {
		$this->prepare();
		if ($dataType === null)
			$this->_statement->bindValue($name, $value, $this->_connection->getPdoType(gettype($value)));
		else
			$this->_statement->bindValue($name, $value, $dataType);
		if ($this->_connection->enableParamLogging)
			$this->_params [$name] = var_export($value, true);
		return $this;
	}

	/**
	 * Executes the SQL statement.
	 * This method is meant only for executing non-query SQL statement.
	 * No result set will be returned.
	 * @param array input parameters (name=>value) for the SQL execution. This is an alternative
	 * to {@link bindParam} and {@link bindValue}. If you have multiple input parameters, passing
	 * them in this way can improve the performance. Note that you pass parameters in this way,
	 * you cannot bind parameters or values using {@link bindParam} or {@link bindValue}, and vice versa.
	 * binding methods and the input parameters this way can improve the performance.
	 * This parameter has been available since version 1.0.10.
	 * @return integer number of rows affected by the execution.
	 * @throws CException execution failed
	 */
	public function execute($params = array()) {
		if ($this->_connection->enableParamLogging && ($pars = array_merge($this->_params, $params)) !== array()) {
			$p = array();
			foreach ($pars as $name => $value)
				$p [$name] = $name . '=' . $value;
			$par = '. Bind with parameter ' . implode(', ', $p);
		} else
			$par = '';
		Yii::trace('Executing SQL: ' . $this->getText() . $par, 'system.db.CDbCommand');
		try {
			if ($this->_connection->enableProfiling)
				Yii::beginProfile('system.db.CDbCommand.execute(' . $this->getText() . ')', 'system.db.CDbCommand.execute');

			$this->prepare();
			$this->_statement->execute($params === array() ? null : $params);
			$n = $this->_statement->rowCount();

			if ($this->_connection->enableProfiling)
				Yii::endProfile('system.db.CDbCommand.execute(' . $this->getText() . ')', 'system.db.CDbCommand.execute');

			return $n;
		} catch (Exception $e) {
			if ($this->_connection->enableProfiling)
				Yii::endProfile('system.db.CDbCommand.execute(' . $this->getText() . ')', 'system.db.CDbCommand.execute');
			Yii::log('Error in executing SQL: ' . $this->getText() . $par, CLogger::LEVEL_ERROR, 'system.db.CDbCommand');
			throw new CDbException (Yii::t('yii', 'CDbCommand failed to execute the SQL statement: {error}', array('{error}' => $e->getMessage())));
		}
	}

	/**
	 * Executes the SQL statement and returns query result.
	 * This method is for executing an SQL query that returns result set.
	 * @param array input parameters (name=>value) for the SQL execution. This is an alternative
	 * to {@link bindParam} and {@link bindValue}. If you have multiple input parameters, passing
	 * them in this way can improve the performance. Note that you pass parameters in this way,
	 * you cannot bind parameters or values using {@link bindParam} or {@link bindValue}, and vice versa.
	 * binding methods and the input parameters this way can improve the performance.
	 * This parameter has been available since version 1.0.10.
	 * @return CDbDataReader the reader object for fetching the query result
	 * @throws CException execution failed
	 */
	public function query($params = array()) {
		return $this->queryInternal('', 0, $params);
	}

	/**
	 * Executes the SQL statement and returns all rows.
	 * @param boolean whether each row should be returned as an associated array with
	 * column names as the keys or the array keys are column indexes (0-based).
	 * @param array input parameters (name=>value) for the SQL execution. This is an alternative
	 * to {@link bindParam} and {@link bindValue}. If you have multiple input parameters, passing
	 * them in this way can improve the performance. Note that you pass parameters in this way,
	 * you cannot bind parameters or values using {@link bindParam} or {@link bindValue}, and vice versa.
	 * binding methods and the input parameters this way can improve the performance.
	 * This parameter has been available since version 1.0.10.
	 * @return array all rows of the query result. Each array element is an array representing a row.
	 * An empty array is returned if the query results in nothing.
	 * @throws CException execution failed
	 */
	public function queryAll($fetchAssociative = true, $params = array()) {
		return $this->queryInternal('fetchAll', $fetchAssociative ? PDO::FETCH_ASSOC : PDO::FETCH_NUM, $params);
	}

	/**
	 * Executes the SQL statement and returns the first row of the result.
	 * This is a convenient method of {@link query} when only the first row of data is needed.
	 * @param boolean whether the row should be returned as an associated array with
	 * column names as the keys or the array keys are column indexes (0-based).
	 * @param array input parameters (name=>value) for the SQL execution. This is an alternative
	 * to {@link bindParam} and {@link bindValue}. If you have multiple input parameters, passing
	 * them in this way can improve the performance. Note that you pass parameters in this way,
	 * you cannot bind parameters or values using {@link bindParam} or {@link bindValue}, and vice versa.
	 * binding methods and the input parameters this way can improve the performance.
	 * This parameter has been available since version 1.0.10.
	 * @return array the first row of the query result, false if no result.
	 * @throws CException execution failed
	 */
	public function queryRow($fetchAssociative = true, $params = array()) {
		return $this->queryInternal('fetch', $fetchAssociative ? PDO::FETCH_ASSOC : PDO::FETCH_NUM, $params);
	}

	/**
	 * Executes the SQL statement and returns the value of the first column in the first row of data.
	 * This is a convenient method of {@link query} when only a single scalar
	 * value is needed (e.g. obtaining the count of the records).
	 * @param array input parameters (name=>value) for the SQL execution. This is an alternative
	 * to {@link bindParam} and {@link bindValue}. If you have multiple input parameters, passing
	 * them in this way can improve the performance. Note that you pass parameters in this way,
	 * you cannot bind parameters or values using {@link bindParam} or {@link bindValue}, and vice versa.
	 * binding methods and the input parameters this way can improve the performance.
	 * This parameter has been available since version 1.0.10.
	 * @return mixed the value of the first column in the first row of the query result. False is returned if there is no value.
	 * @throws CException execution failed
	 */
	public function queryScalar($params = array()) {
		$result = $this->queryInternal('fetchColumn', 0, $params);
		if (is_resource($result) && get_resource_type($result) === 'stream')
			return stream_get_contents($result);
		else
			return $result;
	}

	/**
	 * Executes the SQL statement and returns the first column of the result.
	 * This is a convenient method of {@link query} when only the first column of data is needed.
	 * Note, the column returned will contain the first element in each row of result.
	 * @param array input parameters (name=>value) for the SQL execution. This is an alternative
	 * to {@link bindParam} and {@link bindValue}. If you have multiple input parameters, passing
	 * them in this way can improve the performance. Note that you pass parameters in this way,
	 * you cannot bind parameters or values using {@link bindParam} or {@link bindValue}, and vice versa.
	 * binding methods and the input parameters this way can improve the performance.
	 * This parameter has been available since version 1.0.10.
	 * @return array the first column of the query result. Empty array if no result.
	 * @throws CException execution failed
	 */
	public function queryColumn($params = array()) {
		return $this->queryInternal('fetchAll', PDO::FETCH_COLUMN, $params);
	}

	/**
	 * @param string method of PDOStatement to be called
	 * @param mixed the first parameter to be passed to the method
	 * @param array input parameters (name=>value) for the SQL execution. This is an alternative
	 * to {@link bindParam} and {@link bindValue}. If you have multiple input parameters, passing
	 * them in this way can improve the performance. Note that you pass parameters in this way,
	 * you cannot bind parameters or values using {@link bindParam} or {@link bindValue}, and vice versa.
	 * binding methods and the input parameters this way can improve the performance.
	 * This parameter has been available since version 1.0.10.
	 * @return mixed the method execution result
	 */
	private function queryInternal($method, $mode, $params = array()) {
		if ($this->_connection->enableParamLogging && ($pars = array_merge($this->_params, $params)) !== array()) {
			$p = array();
			foreach ($pars as $name => $value)
				$p [$name] = $name . '=' . $value;
			$par = '. Bind with parameter ' . implode(', ', $p);
		} else
			$par = '';
		Yii::trace('Querying SQL: ' . $this->getText() . $par, 'system.db.CDbCommand');
		try {
			if ($this->_connection->enableProfiling)
				Yii::beginProfile('system.db.CDbCommand.query(' . $this->getText() . ')', 'system.db.CDbCommand.query');

			$this->prepare();
			$this->_statement->execute($params === array() ? null : $params);

			if ($method === '')
				$result = new CDbDataReader ($this);
			else {
				$result = $this->_statement->{$method} ($mode);
				$this->_statement->closeCursor();
			}

			if ($this->_connection->enableProfiling)
				Yii::endProfile('system.db.CDbCommand.query(' . $this->getText() . ')', 'system.db.CDbCommand.query');

			return $result;
		} catch (Exception $e) {
			if ($this->_connection->enableProfiling)
				Yii::endProfile('system.db.CDbCommand.query(' . $this->getText() . ')', 'system.db.CDbCommand.query');
			Yii::log('Error in querying SQL: ' . $this->getText() . $par, CLogger::LEVEL_ERROR, 'system.db.CDbCommand');
			throw new CDbException (Yii::t('yii', 'CDbCommand failed to execute the SQL statement: {error}', array('{error}' => $e->getMessage())));
		}
	}
}

?>