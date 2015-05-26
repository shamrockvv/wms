<?php

return array(
	// android platform flag
	'androidPlatform' => 'a',
	// iPhone platform flag
	'iPhonePlatform' => 'i',
	// PC platform flag
	'pcPlatform' => 'p',
	'errorMessage' => '{"code":404}',
	// Must modify this value, if you modify the value of other
	'VERSION' => '9',
	// Questioin integral
	'QUESTION_INTEGRAL' => '-5',
	// Answer integral
	'ANSWER_INTEGRAL' => '+5',
	//Answer common experience
	'ANSWER_COMMON_EXPERIENCE' => '+2',
	//Anser quick experience
	'ANSWER_QUICK_EXPERIENCE' => '+4',
	//Answer master common experience
	'ANSWER_MASTER_COMMON_EXPERIENCE' => '+3',
	//Anser master quick experience
	'ANSWER_MASTER_QUICK_EXPERIENCE' => '+6',
	//Answer vote experience
	'ANSWER_VOTE_EXPERIENCE' => '1',
	//Answer vote coin
	'ANSWER_VOTE_COIN' => '2',
	//Answer vote rp
	'ANSWER_VOTE_RP' => '1',
	// Initialize total integral
	'INIT_INTEGRAL' => 100,
	// Init group id
	'INIT_GROUP' => 1,
	// Init level id
	'INIT_LEVEL' => 1,
	'REQUEST_HOST' => 'http://192.168.1.3/api/api/index.php?r=/',
	'TOP_QUESTION_NUM' => '10',
	// Avatar URL: http://img.kfkx.net/?did=1[&type=middle]
	'AVATAR_URL' => 'http://img.kfkx.net/',
	'ISHARE_REQUEST_HOST' => 'http://opda.co/',
	'ISHARE_ICON_URL' => 'I',
	'ISHARE_AD_DOWNLOAD_URL' => 'AD',
	'ISHARE_DOWNLOAD_URL' => 'D',
	'MEDAL_URL' => 'M',
	'DOWNLOAD_URL' => 'D',
	'RESOURCE_PATH' => dirname(__FILE__) . '/../../../upload/',
	'MEDAL_PATH' => dirname(__FILE__) . '/../../upload/medal/',
	'UPLOAD_PATH' => dirname(__FILE__) . '/../../upload/',
	'SERVER_UPGRADE' => '0',
	'SERVER_MESSAGE' => '服务器正在维护,请稍后再试!',
	'IMG_MARK' => dirname(__FILE__) . '/../data/opda.png',
	'TOKEN' => 'opda_20121207',
	'wx_opt' => array(
		'debug' => true,
		'token' => 'opda2010000',
		'appid' => 'wxc060491715f14ccd',
		'appsecret' => 'bcf66e654a9bf02555929c5904fb4986',
		'logcallback' => 'logdebug',
	),
);
?>