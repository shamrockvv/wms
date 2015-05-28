<?php

/**
 * Created by PhpStorm.
 * User: e
 * Date: 2015-05-28
 * Time: 11:58
 */
class Baoguo extends OBaoguo {
    public static function model($className = __CLASS__) {
        return parent::model($className);
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