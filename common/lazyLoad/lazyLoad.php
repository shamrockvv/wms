<?php

class lazyLoad extends CWidget {

	public function init() {
		$this->publishAssets();
	}

	public function run() {
		$config = '400';
		$config = CJavaScript::encode($config);
		Yii::app()->getClientScript()->registerCoreScript('jquery');
		Yii::app()->getClientScript()->registerScript('unveil', "
			$(document).ready(function () {
				$('img.lazy').unveil();
			});
			$(document).ajaxComplete(function () {
				$('img.lazy').unveil();
			});
		", CClientScript::POS_END);
	}

	public function publishAssets() {
		$assets = dirname(__FILE__) . '/assets';
		$baseUrl = Yii::app()->assetManager->publish($assets);
		if (is_dir($assets)) {
			Yii::app()->clientScript->registerCoreScript('jquery');
			if (YII_DEBUG) {
				Yii::app()->clientScript->registerScriptFile($baseUrl . '/jquery.unveil.js', CClientScript::POS_HEAD);
			} else {
				Yii::app()->clientScript->registerScriptFile($baseUrl . '/jquery.unveil.min.js', CClientScript::POS_HEAD);
			}
		} else {
			throw new Exception('lazyLoad - publish assets error.');
		}
	}
}