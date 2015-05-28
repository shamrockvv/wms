<?php

/**
 * Created by PhpStorm.
 * User: e
 * Date: 2015-05-27
 * Time: 11:07
 */
class Kuwei extends OKuwei {
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'partner' => 'Partner',
            'kuweihao' => '库位号',
            'suoshucangku' => '所属仓库',
            'gonghuoshang' => '供货商',
            'suoshukehu' => '所属客户',
            'kehubianhao' => '客户编号',
            'zhengcanleixing' => '正/残类型',
            'total' => '库存合计',
            'frozen' => '冻结库存',
            'fanchang_frozen' => '返厂冻结',
            'dingdan_frozen' => '订单冻结',
            'yishi_frozen' => '遗失冻结',
            'chayishuliang' => '差异数量',
            'shangpinyouxiaoqi' => '商品有效期',
            'baozhiqi' => '保质期',
            'shengchanriqi' => '生产日期',
            'youxiaoqitianshu' => '有效期天数',
            'shangpinmingcheng' => '商品名称',
            'chuchang_bar' => '出厂条码',
            'nei_bar' => '内码',
            'input_man' => '录入人',
            'createtime' => '录入时间',
            'leixing' => '类型',
            'lock' => '是否锁定',
        );
    }
    public function getKehuNumber($id) {
        $criteria = new CDbCriteria();
        $criteria->distinct = true;
        $criteria->select = 'kehubianhao';
        $criteria->addCondition("suoshucangku!='选择仓库'");
        $criteria->addCondition("suoshucangku=:ck");
        $criteria->addCondition("suoshucangku='选择仓库'",'or');
        $criteria->params = array(":ck" => $id);
        $model = $this->findAll($criteria);
        return count($model);
    }

    public function getPinzhongNumber($id) {
        $criteria = new CDbCriteria();
        $criteria->distinct = true;
        $criteria->select = 'nei_bar';
        $criteria->addCondition("suoshucangku!='选择仓库'");
        $criteria->addCondition("suoshucangku=:ck");
        $criteria->addCondition("suoshucangku='选择仓库'",'or');
        $criteria->addCondition("nei_bar>0");
        $criteria->params = array(":ck" => $id);
        $model = $this->findAll($criteria);
        return count($model);
    }

    public function getZongkucunNumber($id){
        $criteria = new CDbCriteria();
        $criteria->distinct = true;
        $criteria->select = 'nei_bar';
        $criteria->addCondition("suoshucangku!='选择仓库'");
        $criteria->addCondition("suoshucangku=:ck");
        $criteria->addCondition("suoshucangku='选择仓库'",'or');
        $criteria->addCondition("nei_bar>0");
        $criteria->params = array(":ck" => $id);
        $model = $this->findAll($criteria);
        return count($model);
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