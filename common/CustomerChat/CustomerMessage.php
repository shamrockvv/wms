<?php
/**
 * Created by JetBrains PhpStorm.
 * User: peipei
 * Date: 13-3-22
 * Time: 下午5:44
 * To change this template use File | Settings | File Templates.
 */
class CustomerMessage extends CWidget {
    public $kfid;
    public $model;
    public function run() {
        $uid=Yii::app()->user->getId();
        $usernamea= User::model()->find('id =:id', array(':id' => $uid));
        $username=$usernamea['username'];
        $kfnamea=LAdminUser::model()->find('id =:id', array(':id' => $this->kfid));
        $kfname=$kfnamea['username'];
        $this->render('message',array('model'=>$this->model,'username'=>$username,'kfname'=>$kfname,'uid'=>$uid,'kfid'=>$this->kfid));
    }
}