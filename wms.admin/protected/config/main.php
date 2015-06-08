<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => 'WMS后台',
	'language' => 'zh_cn',
	// preloading 'log' component
	'preload' => array('log', 'bootstrap', 'flatui','flatui3'),
	// autoloading model and component classes
	'import' => require(dirname(__FILE__) . '/import.php'),
	'modules' => array(
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => 'opda',
			'ipFilters' => array('127.0.0.1', '::1'),
			'generatorPaths' => array(
				'bootstrap.gii', // since 0.9.1
			),
		),
	),
	// application components
	'components' => array(
        'clientScript' => array(
            'class' => 'common.minify.EClientScript',
            'combineScriptFiles' => !YII_DEBUG,
            'combineCssFiles' => !YII_DEBUG,
            'scriptMap' => array(
                'jquery-ui.css' => false,
            ),
        ),
		'bootstrap' => array(
			'class' => 'bootstrap.components.Bootstrap',
		),
		'flatui' => array(
			'class' => 'flatui.components.FlatUI',
		),
        'flatui3'=>array(
            'class' => 'flatui3.components.FlatUI',
        ),
		'user' => array(
			// enable cookie-based authentication
			'allowAutoLogin' => true,
			'autoRenewCookie' => true,
			'stateKeyPrefix' => 'wms_auth',
			'class' => 'UserAccess',
		),
		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'rules' => require(dirname(__FILE__) . '/url.php'),
		),
		//		'search' => array(
		//			'class' => 'application.components.DGSphinxSearch.DGSphinxSearch',
		//			'server' => '192.168.1.3',
		//			'port' => 9312,
		//			'maxQueryTime' => 3000,
		//			'enableProfiling' => 0,
		//			'enableResultTrace' => 0,
		//		),
		'db' => require(dirname(__FILE__) . '/db.php'),
		'errorHandler' => array(
			// use 'site/error' action to display errors
			'errorAction' => 'site/error',
		),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
				),
				array(
					'class' => 'CWebLogRoute',
				),
			),
		),
		//'cache' => array(
		//	'class' => 'CMCache',
		//	'servers' => array(
		//		array(
		//			'host' => '127.0.0.1',
		//			'port' => 11211,
		//			'weight' => 100,
		//		),
		//	),
		//),
		'ftp' => array(
			'class' => 'common.ftp.EFtpComponent',
			'host' => '58.253.192.76',
			'port' => 21,
			'username' => 'static',
			'password' => '6TB1vrS9',
			'ssl' => false,
			'timeout' => 120,
		),
		'mailer' => array(
			'class' => 'common.SwiftMailer.SwiftMailer',
			'mailer' => 'smtp',
			'host' => 'smtp.exmail.qq.com',
			'From' => '',
			'username' => '',
			'password' => '',
		),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => require(dirname(__FILE__) . '/params.php'),
);
