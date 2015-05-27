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
            'kuweihao' => 'Kuweihao',
            'suoshucangku' => 'Suoshucangku',
            'gonghuoshang' => 'Gonghuoshang',
            'suoshukehu' => 'Suoshukehu',
            'kehubianhao' => 'Kehubianhao',
            'zhengcanleixing' => 'Zhengcanleixing',
            'total' => 'Total',
            'frozen' => 'Frozen',
            'fanchang_frozen' => 'Fanchang Frozen',
            'dingdan_frozen' => 'Dingdan Frozen',
            'yishi_frozen' => 'Yishi Frozen',
            'chayishuliang' => 'Chayishuliang',
            'shangpinyouxiaoqi' => 'Shangpinyouxiaoqi',
            'baozhiqi' => 'Baozhiqi',
            'shengchanriqi' => 'Shengchanriqi',
            'youxiaoqitianshu' => 'Youxiaoqitianshu',
            'shangpinmingcheng' => 'Shangpinmingcheng',
            'chuchang_bar' => 'Chuchang Bar',
            'nei_bar' => 'Nei Bar',
            'input_man' => 'Input Man',
            'createtime' => 'Createtime',
            'leixing' => 'Leixing',
            'lock' => 'Lock',
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