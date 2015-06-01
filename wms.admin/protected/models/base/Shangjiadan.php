<?php

/**
 * Created by PhpStorm.
 * User: e
 * Date: 2015-06-01
 * Time: 9:55
 */
class Shangjiadan extends OShangjiadan {
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'partner' => 'Partner',
            'laiyuan' => 'Laiyuan',
            'shangjiadanhao' => '商家单号',
            'order_code' => '上级单号',
            'suoshukehu' => '所属客户',
            'kehubianhao' => '客户编号',
            'suoshucangku' => '所属仓库',
            'order_type_explain' => 'Order Type Explain',
            'xiaoshouleixing' => '销售类型',
            'rukucangku' => '入库仓库',
            'gonghuoshang' => '供货商',
            'zhengcanleixing' => '正残类型',
            'remark' => '备注',
            'shangpinmingcheng' => '商品名称',
            'chuchang_bar' => '出厂条码',
            'nei_bar' => '内码',
            'chengbenjia' => '成本价',
            'caigoujia' => '采购价',
            'wangluodanjia' => '网络单价',
            'yuyueshuliang' => '预约数量',
            'shangjiashuliang' => '商家数量',
            'shangpinyouxiaoqi' => '商品有效期',
            'baozhiqi' => '保质期',
            'shengchanriqi' => '生产日期',
            'youxiaoqitianshu' => '有效天数',
            'kuweihao' => '库位号',
            'caozuoren' => '操作人',
            'createtime' => '操作时间',
            'isshangjia' => '是否上架',
            'querenren' => '确认人',
            'queren_time' => '确认时间',
        );
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
}