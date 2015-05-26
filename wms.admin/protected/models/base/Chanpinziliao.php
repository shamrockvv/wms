<?php

/**
 * Created by PhpStorm.
 * User: e
 * Date: 2015-05-26
 * Time: 9:32
 */
class Chanpinziliao extends OChanpinziliao {
    public $fileField = '';
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'beidacang_productid' => '北大荒产品ID',
            'partner' => 'Partner',
            'chuchang_bar' => '出长条码',
            'nei_bar' => '内码',
            'shangpinmingcheng' => '商品名称',
            'suoshucangku' => '所属仓库',
            'suoshukehu' => '所属客户',
            'kehubianhao' => '客户编号',
            'lock' => 'Lock',
            'lururen' => '录入人',
            'createtime' => '录入时间',
            'Attributes' => 'Attributes',
            'sku' => 'Sku',
            'yanse' => '颜色',
            'chima' => '尺码',
            'rongji' => '容积',
            'jiage' => '价格',
            'qikanhao' => '期刊号',
            'fenlei_name1' => '一级分类',
            'fenlei_name2' => '二级分类',
            'fenlei_name3' => '三级分类',
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