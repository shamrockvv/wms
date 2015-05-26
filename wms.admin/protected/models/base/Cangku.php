<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 2015-05-26
 * Time: 11:51
 */

class Cangku extends OCangku{
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getList(){
        return $this->findAll();
    }
}