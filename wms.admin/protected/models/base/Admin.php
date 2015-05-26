<?php

/**
 * Created by PhpStorm.
 * User: e
 * Date: 2015/5/25
 * Time: 16:55
 */
class Admin extends OAdmin {
    const LEVEL_SUPERADMIN = '1', LEVEL_LOW_SUPERADMIN = '1', LEVEL_ADVANCEADMIN = 1, LEVEL_ADMIN = 2, LEVEL_LOWERADMIN = 3, LEVEL_LOWESTADMIN = 4, LEVEL_OTHERADMIN = 5, LEVEL_OTHERUSER = 6, LEVEL_VISITUSER = 7;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
}