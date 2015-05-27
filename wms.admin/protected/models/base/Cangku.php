<?php

/**
 * Created by PhpStorm.
 * User: e
 * Date: 2015-05-26
 * Time: 11:51
 */
class Cangku extends OCangku {
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'cangkuid' => '仓库编号',
            'cangkuname' => '仓库名称',
            'linkphone' => '联系电话',
            'linkman' => '联系人',
            'address' => '地址',
            'lock' => '是否锁定',
            'createtime' => '录入时间',
            'store_code' => '天猫仓库编码',
            'input_man' => '录入人',
        );
    }
    protected function beforeSave() {
        Yii::trace(get_class($this) . '.beforeSave()');
        if (parent::beforeSave()) {
            $this->createtime = date('Y-m-d H:i:s');
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function getList() {
        return $this->findAll();
    }
}