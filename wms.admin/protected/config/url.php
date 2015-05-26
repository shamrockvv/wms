<?php
return array(
	'<_c:(image|file)>/<_a>/<id:\d+>' => '<_c>/<_a>',
	'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
	'<controller:\w+>/<id:\d+>' => '<controller>/view',
	'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
);