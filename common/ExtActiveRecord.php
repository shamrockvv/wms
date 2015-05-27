<?php

/**
 * @author gongyou3@opda.cn
 */
class ExtActiveRecord extends CActiveRecord {

	protected static $tableSuffix;

	public static function model($className = __CLASS__, $isPartition = false) {
		if ($isPartition) {
			$model = new $className(null);
			$model->attachBehaviors($model->behaviors());
			return $model;
		}
		return parent::model($className);
	}

	public function getDbConnection() {
		return Yii::app()->kfkxextDb;
	}

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