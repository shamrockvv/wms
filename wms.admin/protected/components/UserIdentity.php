<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {
	private $_id;

	public function authenticate() {
		$username = strtolower($this->username);
        $userpwd = strtolower($this->password);
		$user = Admin::model()->find('LOWER(adminid)=?', array($username));
		//$salt = md5(md5($this->password) . Yii::app()->params['TOKEN']);
		//$password_hash = crypt($this->password, $salt);
		if ($user === null)
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		else if ($user->adminpwd !== $userpwd)
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else {
			$this->_id = $user->id;
			$this->username = $user->adminname;
			$this->errorCode = self::ERROR_NONE;
		}
		return $this->errorCode == self::ERROR_NONE;
	}

	public function getId() {
		return $this->_id;
	}

	public function getName() {
		return $this->username;
	}
}