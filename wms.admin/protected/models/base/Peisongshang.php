<?php

/**
 * Created by PhpStorm.
 * User: e
 * Date: 2015-05-27
 * Time: 11:45
 */
class Peisongshang extends OPeisongshang {
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'peisongshangname' => '配送商名称',
            'linkphone' => '联系电话',
            'linkman' => '联系人',
            'address' => '地址',
            'qq' => 'Qq',
            'netaddress' => '网址',
            'remark' => '备注',
            'createtime' => '创建时间',
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
}