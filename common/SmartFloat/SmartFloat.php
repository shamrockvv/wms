<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lxe
 * Date: 13-6-20
 * Time: 下午2:00
 * To change this template use File | Settings | File Templates.
 */
class SmartFloat extends CWidget {

	public $top = null;
	public $bottom = null;
	public $width = null;
	public $reverse = false;
	public $select = '#top-bar';
	public $config = array();

	public function run() {

		$this->publishAssets();

		if ($this->top !== null)
			$options['top'] = (float)$this->top;
		if ($this->width !== null)
			$options['width'] = (float)$this->width;
		if ($this->bottom !== null)
			$options['bottom'] = (float)$this->bottom;
		if ($this->reverse)
			$options['reverse'] = true;
		if ($this->config)
			$options = array_merge($this->config, $options);

		$options = empty($options) ? '' : CJavaScript::encode($options);
		Yii::app()->getClientScript()->registerScript(uniqid(), "
			$('$this->select').smartFloat($options);
		", CClientScript::POS_READY);
	}

	protected function publishAssets() {
		$assets = dirname(__FILE__) . '/assets';
		$baseUrl = Yii::app()->assetManager->publish($assets);
		if (is_dir($assets)) {
			Yii::app()->clientScript->registerCoreScript('jquery');
			if (YII_DEBUG)
				Yii::app()->clientScript->registerScriptFile($baseUrl . '/jquery.smartfloat.js', CClientScript::POS_END);
			else
				Yii::app()->clientScript->registerScriptFile($baseUrl . '/jquery.smartfloat.min.js', CClientScript::POS_END);
		} else {
			throw new Exception('SmartFloat - Error: Couldn\'t publish assets.');
		}
	}

}