<?php

class CMCache extends CCache {

	/**
	 * @var Memcache the Memcache instance
	 */
	private $_cache = null;

	/**
	 * @var array list of memcache server configurations
	 */
	private $_servers = array();

	/**
	 * Initializes this application component.
	 * This method is required by the {@link IApplicationComponent} interface.
	 * It creates the memcache instance and adds memcache servers.
	 * @throws CException if memcache extension is not loaded
	 */
	public function init() {
		parent::init();
		$servers = $this->getServers();
		$cache = $this->getMemCache();
		if (count($servers) && count($servers) > 1) {
			foreach ($servers as $server) {
				$cache->addServer($server->host, $server->port, $server->weight);
			}
//			$cache->setOption(Memcached::OPT_TCP_NODELAY, true);
//			$cache->setOption(Memcached::OPT_RECV_TIMEOUT, 2000);
//			$cache->setOption(Memcached::OPT_SEND_TIMEOUT, 2000);
			$cache->setOption(Memcached::OPT_DISTRIBUTION, Memcached::DISTRIBUTION_CONSISTENT);
			$cache->setOption(Memcached::OPT_COMPRESSION, false);
			$cache->setOption(Memcached::OPT_LIBKETAMA_COMPATIBLE, true);
		} else
			$cache->addServer('localhost', 11211);
	}

	/**
	 * @return mixed the memcache instance (or memcached if {@link useMemcached} is true) used by this component.
	 */
	public function getMemCache() {
		if ($this->_cache !== null)
			return $this->_cache;
		else
			return $this->_cache = new Memcached;
	}

	/**
	 * @return array list of memcache server configurations. Each element is a {@link CMemCacheServerConfiguration}.
	 */
	public function getServers() {
		return $this->_servers;
	}

	/**
	 * @param array $config list of memcache server configurations. Each element must be an array
	 * with the following keys: host, port, persistent, weight, timeout, retryInterval, status.
	 * @see http://www.php.net/manual/en/function.Memcache-addServer.php
	 */
	public function setServers($config) {
		foreach ($config as $c)
			$this->_servers[] = new CMemCacheServerConfiguration($c);
	}

	/**
	 * Retrieves a value from cache with a specified key.
	 * This is the implementation of the method declared in the parent class.
	 * @param string $key a unique key identifying the cached value
	 * @return string the value stored in cache, false if the value is not in the cache or expired.
	 */
	protected function getValue($key) {
		return $this->_cache->get($key);
	}

	/**
	 * Retrieves multiple values from cache with the specified keys.
	 * @param array $keys a list of keys identifying the cached values
	 * @return array a list of cached values indexed by the keys
	 * @since 1.0.8
	 */
	protected function getValues($keys) {
		return $this->_cache->getMulti($keys);
	}

	/**
	 * Stores a value identified by a key in cache.
	 * This is the implementation of the method declared in the parent class.
	 *
	 * @param string $key the key identifying the value to be cached
	 * @param string $value the value to be cached
	 * @param integer $expire the number of seconds in which the cached value will expire. 0 means never expire.
	 * @return boolean true if the value is successfully stored into cache, false otherwise
	 */
	protected function setValue($key, $value, $expire) {
		return $this->_cache->set($key, $value, $expire);
	}

	/**
	 * Stores a value identified by a key into cache if the cache does not contain this key.
	 * This is the implementation of the method declared in the parent class.
	 *
	 * @param string $key the key identifying the value to be cached
	 * @param string $value the value to be cached
	 * @param integer $expire the number of seconds in which the cached value will expire. 0 means never expire.
	 * @return boolean true if the value is successfully stored into cache, false otherwise
	 */
	protected function addValue($key, $value, $expire) {
		if ($expire > 0)
			$expire += time();
		else
			$expire = 0;

		return $this->_cache->add($key, $value, $expire);
	}

	/**
	 * Deletes a value with the specified key from cache
	 * This is the implementation of the method declared in the parent class.
	 * @param string $key the key of the value to be deleted
	 * @return boolean if no error happens during deletion
	 */
	protected function deleteValue($key) {
		return $this->_cache->delete($key, 0);
	}

	/**
	 * Deletes all values from cache.
	 * This is the implementation of the method declared in the parent class.
	 * @return boolean whether the flush operation was successful.
	 * @since 1.1.5
	 */
	protected function flushValues() {
		return $this->_cache->flush();
	}

}

/**
 * CMemCacheServerConfiguration represents the configuration data for a single memcache server.
 *
 * See {@link http://www.php.net/manual/en/function.Memcache-addServer.php}
 * for detailed explanation of each configuration property.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @version $Id: CMemCache.php 3426 2011-10-25 00:01:09Z alexander.makarow $
 * @package system.caching
 * @since 1.0
 */
class CMemCacheServerConfiguration extends CComponent {

	/**
	 * @var string memcache server hostname or IP address
	 */
	public $host;

	/**
	 * @var integer memcache server port
	 */
	public $port = 11211;

	/**
	 * @var boolean whether to use a persistent connection
	 */
	public $persistent = true;

	/**
	 * @var integer probability of using this server among all servers.
	 */
	public $weight = 1;

	/**
	 * @var integer value in seconds which will be used for connecting to the server
	 */
	public $timeout = 15;

	/**
	 * @var integer how often a failed server will be retried (in seconds)
	 */
	public $retryInterval = 15;

	/**
	 * @var boolean if the server should be flagged as online upon a failure
	 */
	public $status = true;

	/**
	 * Constructor.
	 * @param array $config list of memcache server configurations.
	 * @throws CException if the configuration is not an array
	 */
	public function __construct($config) {
		if (is_array($config)) {
			foreach ($config as $key => $value)
				$this->$key = $value;
			if ($this->host === null)
				throw new CException(Yii::t('yii', 'CMemCache server configuration must have "host" value.'));
		} else
			throw new CException(Yii::t('yii', 'CMemCache server configuration must be an array.'));
	}

}