<?php
Yii::import('zii.widgets.CPortlet');

class CPortletExt extends CPortlet {

	public $renderDirect = false;

	public function init() {
		if (!$this->renderDirect) {
			parent::init();
		}
	}

	public function run() {
		if (!$this->renderDirect) {
			parent::run();
		} else {
			$this->renderContent();
		}
	}

	protected function renderContent() {
	}
}