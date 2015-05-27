<?php

class FlatUI extends CApplicationComponent {

	public $forceCopyAssets = false;

	protected $_assetsUrl;

	public function registerCoreCss() {
		$filename = YII_DEBUG ? 'flat-ui.css' : 'flat-ui.css';
		Yii::app()->clientScript->registerCssFile($this->getAssetsUrl() . '/css/' . $filename);
	}

	public function registerOther() {
		$cs = Yii::app()->getClientScript();
		$cs->registerScriptFile($this->getAssetsUrl() . '/js/html5shiv.js', CClientScript::POS_HEAD, array('media' => 'lte IE 9'));
		$cs->registerCssFile($this->getAssetsUrl() . '/css/icon-font-ie7.css', 'lte IE 7');
		$cs->registerScriptFile($this->getAssetsUrl() . '/js/icon-font-ie7.js', CClientScript::POS_HEAD, array('media' => 'lte IE 7'));
	}

	public function registerAllCss() {
		$this->registerCoreCss();
		$this->registerOther();
	}

	public function registerCoreScripts() {
		$this->registerJS(Yii::app()->clientScript->coreScriptPosition);
	}

	protected function registerJS($position = CClientScript::POS_HEAD) {
		$cs = Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');
		$cs->registerCoreScript('jquery.ui');
		$cs->registerScriptFile($this->getAssetsUrl() . '/js/jquery.ui.touch-punch.min.js', CClientScript::POS_END);
		$cs->registerScriptFile($this->getAssetsUrl() . '/js/bootstrap-select.js', CClientScript::POS_END);
		$cs->registerScriptFile($this->getAssetsUrl() . '/js/bootstrap-switch.js', CClientScript::POS_END);
		$cs->registerScriptFile($this->getAssetsUrl() . '/js/flatui-checkbox.js', CClientScript::POS_END);
		$cs->registerScriptFile($this->getAssetsUrl() . '/js/flatui-radio.js', CClientScript::POS_END);
		$cs->registerScriptFile($this->getAssetsUrl() . '/js/jquery.tagsinput.js', CClientScript::POS_END);
		$cs->registerScriptFile($this->getAssetsUrl() . '/js/jquery.placeholder.js', CClientScript::POS_END);
		$cs->registerScriptFile($this->getAssetsUrl() . '/js/jquery.stacktable.js', CClientScript::POS_END);
		$cs->registerScriptFile($this->getAssetsUrl() . '/js/application.js', CClientScript::POS_END);
	}

	public function register() {
		$this->registerAllCss();
		$this->registerCoreScripts();
	}

	protected function getAssetsUrl() {
		if (isset($this->_assetsUrl))
			return $this->_assetsUrl;
		else {
			$assetsPath = Yii::getPathOfAlias('flatui.assets');
			$assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, $this->forceCopyAssets);
			return $this->_assetsUrl = $assetsUrl;
		}
	}
}
