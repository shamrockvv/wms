<?php

/**
 * Created by PhpStorm.
 * User: e
 * Date: 2015-05-29
 * Time: 14:38
 */
class Pandiandan extends OPandiandan {
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'leixing' => 'Leixing',
            'partner' => 'Partner',
            'pandiandanhao' => '盘点单号',
            'fenqu_pandiandanhao' => '分区盘点单号',
            'kuweihao' => '库位号',
            'kehubianhao' => '客户编号',
            'gonghuoshang' => '供货商',
            'suoshucangku' => '所属仓库',
            'shangpinmingcheng' => '商品名称',
            'suoshukehu' => '所属客户',
            'chuchang_bar' => '出厂条码',
            'nei_bar' => '内码',
            'total' => 'Total',
            'zhengcanleixing' => '正残类型',
            'zhuangtai' => '状态',
            'input_man' => '录入人',
            'createtime' => '录入时间',
            'isshenhe' => '是否审核',
            'shenhe_man' => '审核人',
            'shenhe_time' => '审核时间',
            'isqueren' => '是否确认',
            'queren_man' => '确认人',
            'queren_time' => '确认时间',
            'iszuofei' => '是否作废',
            'zuofei_man' => '作废人',
            'zuofei_time' => '作废时间',
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