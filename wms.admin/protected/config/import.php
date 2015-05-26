<?php
// set path alias
Yii::setPathOfAlias('root', YII_PATH . '/../');
Yii::setPathOfAlias('models', Yii::getPathOfAlias('root') . '/models');
Yii::setPathOfAlias('common', Yii::getPathOfAlias('root') . '/common');
Yii::setPathOfAlias('data', Yii::getPathOfAlias('root') . '/data');
Yii::setPathOfAlias('bootstrap', Yii::getPathOfAlias('common') . '/bootstrap');
Yii::setPathOfAlias('bootstrap3', Yii::getPathOfAlias('common') . '/bootstrap3');
Yii::setPathOfAlias('flatui', Yii::getPathOfAlias('common') . '/flatui');
Yii::setPathOfAlias('flatui3', Yii::getPathOfAlias('common') . '/flatui3');
// autoloading model and component classes
return array(
	'application.components.*',
	'application.models.*',
    'application.models.base.*',
    'application.models.default.base.*',
    'application.models.system.*',
    'application.models.default.system.*',
    'application.models.order.*',
    'application.models.default.order.*',

	'common.*',
	'common.ContrackOnline.contrackonline',
	'common.phpQuery.phpQuery',
	'common.snoopy.Snoopy',
	'common.CFPropertyList.*',
	'common.DateRangePicker.*',
	'common.FormModel.*',
);
?>
