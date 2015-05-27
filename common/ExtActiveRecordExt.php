<?php

/**
 * @author gongyou3@opda.cn
 */
class ExtActiveRecordExt extends CActiveRecord {

	public static function model($className = __CLASS__, $isPartition = false) {
		if ($isPartition) {
			$model = new $className(null);
			$model->attachBehaviors($model->behaviors());
			self::$_md[$className] = new CActiveRecordMetaData($model);
			return $model;
		}
		return parent::model($className);
	}

	protected static $_md = array();

	public function getMetaData() {
		$className = get_class($this);
		if (!array_key_exists($className, self::$_md)) {
			self::$_md[$className] = new CActiveRecordMetaData($this);
		}
		return self::$_md[$className];
	}

	protected static $tableSuffix;

	public static function setTableSuffix($primary, $type = null, $mod = null) {
		switch ($type) {
			case 'mod':
				if ($mod)
					self::$tableSuffix = $primary % $mod;
				break;
			default:
				self::$tableSuffix = $primary;
				break;
		}
	}
}

?>