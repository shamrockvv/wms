<?php

/**
 * Created by PhpStorm.
 * User: apirl
 * Date: 14-7-18
 * Time: 下午5:35
 */
class AES {

	public $key = 'tJAfPhC47pUM+80vuWy13OGCSSvFm5s+tYg7Hcubfb4=';

	public function __construct($key) {
		if ($key) {
			$this->key = $key;
		}

	}

	//mode => MCRYPT_MODE_ECB root sdk 用
	public function Encrypt($data) {
		$decodeKey = base64_decode($this->key);
		$iv = substr($decodeKey, 0, 16);
		$encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $decodeKey, $data, MCRYPT_MODE_CBC, $iv);
		return base64_encode($encrypted);
	}

	public function Decrypt($data) {
		$data = base64_decode($data);
		$decodeKey = base64_decode($this->key);
		$iv = substr($decodeKey, 0, 16);
		$encrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $decodeKey, $data, MCRYPT_MODE_CBC, $iv);

		return $encrypted;
	}
}

?>