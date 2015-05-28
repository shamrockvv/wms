<?php
/**
 * Created by JetBrains PhpStorm.
 * User: peipei
 * Date: 13-3-19
 * Time: 下午3:24
 * To change this template use File | Settings | File Templates.
 */
class CustomerChat extends CWidget {
    public $kfid;
	public $session_id;
    public function run() {
        $uid=Yii::app()->user->getId();
        $usernamea= User::model()->find('id =:id', array(':id' => $uid));
        $username=$usernamea['username'];
        $kfnamea=LAdminUser::model()->find('id =:id', array(':id' => $this->kfid));
        $kfname=$kfnamea['username'];
        $this->render('chat',array('username'=>$username,'kfname'=>$kfname,'uid'=>$uid,'kfid'=>$this->kfid,'session_id'=>$this->session_id));
    }
}