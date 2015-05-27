<?php

/**
 * CActiveRecordExt is the base advanced class for classes representing relational data.
 *
 * EVERY advanced derived AR class must change this method as follows,
 * <pre>
 * public function tableName(){
 * return '{{device_soft}}_' . self::$field;
 * }
 * </pre>
 *
 * EVERY advanced derived AR class must override this method as follows,
 * <pre>
 * public static function model($data = array(), $className=__CLASS__){
 * parent::$partition = array(
 * 'field' => 'device_id',
 * 'type' => 'mod',
 * 'num' => 8
 * );
 * return parent::model($data, $className);
 * }
 * </pre>
 *
 * <pre>
 * DeviceSoft::model(array('device_id' => $this->did))->find('device_id=:device_id', array(':device_id' => $this->did));
 * </pre>
 * @author gongyou3@opda.cn
 */
class CActiveRecordExt extends CActiveRecord {

	public static $db_connection;

	// array('field' => 'device_id', 'type' => 'mod', 'num' => 8);
	protected static $partition = array();

	protected static $field;

	/**
	 *
	 * @param unknown_type $data
	 * @param string $className active record class name.
	 * @return CActiveRecord active record model instance.
	 */
	public static function model($data = array(), $className = __CLASS__) {
		if (!empty($data) && isset($data[self::$partition['field']])) {
			switch (self::$partition['type']) {
				case 'mod' :
					$field = $data[self::$partition['field']];
					// 按照id的模数分表
					$seq = ($field % self::$partition['num']) + 1;
					break;
				case 'num' :
					// 按照name的模数分表
					$seq = self::$partition['num'];
					break;
				case 'lang':
					// 按语言ID分表
					$seq = $data[self::$partition['field']];
					break;
				case 'month':
					//按月份分表
					$seq = self::$partition['field'];
					break;
			}
			self::$field = $seq;
			$model = new $className(null);
			$model->attachBehaviors($model->behaviors());
			return $model;
		}
		return parent::model($className);
	}

	public function getDbConnection() {
		if (self::$db_connection) {
			$connection = self::$db_connection;
			return Yii::app()->$connection;
		} else {
			return Yii::app()->db;
		}
	}
}

?>