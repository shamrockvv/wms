<?php

/**
 * Created by PhpStorm.
 * User: limu
 * Date: 14-8-18
 * Time: 下午2:42
 */
class bs3FileInput extends CWidget {
	public $input;
	public $options = array();

	public function init() {
		$this->publishAssets();
	}

	public function run() {
		$options = empty($this->options) ? '' : CJavaScript::encode($this->options);
		if ($this->input)
			$script = "
			$('$this->input').fileinput($options)
			";
		else {
			$script = "
		    $(document).ready(function () {
		        var input = $('input.file[type=file]'), count = input.attr('type') != null ? input.length : 0;
		        if (count > 0) {
		            input.fileinput();
		        }
		    });
			";
		}
		Yii::app()->getClientScript()->registerScript(uniqid(),
			$script
			, CClientScript::POS_END);
	}

	protected function publishAssets() {
		$assets = dirname(__FILE__) . '/assets';
		$baseUrl = Yii::app()->assetManager->publish($assets);
		if (is_dir($assets)) {
			$cs = Yii::app()->clientScript;
			if (YII_DEBUG) {
				$cs->registerScriptFile($baseUrl . '/js/fileinput.js');
				$cs->registerCssFile($baseUrl . '/css/fileinput.css');
			} else {
				$cs->registerScriptFile($baseUrl . '/js/fileinput.min.js');
				$cs->registerCssFile($baseUrl . '/css/fileinput.min.css');
			}

		} else {
			throw new Exception('SmartFloat - Error: Couldn\'t publish assets.');
		}
	}
} 