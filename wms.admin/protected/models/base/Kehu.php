<?php

/**
 * Created by PhpStorm.
 * User: e
 * Date: 2015-05-26
 * Time: 9:32
 */
class Kehu extends OKehu {
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'partner' => 'Partner',
            'laiyuan' => '来源',
            'kehubianhao' => '客户编号',
            'user_id' => '客户账号',
            'kehuname' => '客户名称',
            'linkphone' => '联系电话',
            'linkmobile' => '联系手机',
            'linkman' => '联系人',
            'address' => '地址',
            'qq' => 'Qq',
            'netaddress' => '网址',
            'remark' => '备注',
            'wuliu' => 'Wuliu',
            'input_man' => '录入人',
            'createtime' => '录入时间',
            'zancunkuwei' => '暂存库位',
            'dingdan_zancunkuwei' => '订单暂存库位',
            'kucunfanchang_zancunkuwei' => '返厂暂存库位',
        );
    }

    public function getIdByName($name) {
        $model = $this->find("kehuname=:name", array(":name" => $name));
        return $model ? $model->kehubianhao : '';
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