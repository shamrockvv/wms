<?php

class typeahead extends CInputWidget {
	/**
	 * @var array the options for the Bootstrap Javascript plugin.
	 */
	public $options = array();

	/**
	 * Initializes the widget.
	 */
	public function init() {
		$this->registerClientScript();
		$this->registerCssFile();
		$this->htmlOptions['type'] = 'text';
	}

	public function registerClientScript() {
		if (YII_DEBUG) {
			$url = CHtml::asset(Yii::getPathOfAlias('common.typeahead.assets') . '/typeahead.min.js', CClientScript::POS_END);
			$hogan = CHtml::asset(Yii::getPathOfAlias('common.typeahead.assets') . '/hogan-2.0.0.min.js', CClientScript::POS_END);
		} else {
			$url = CHtml::asset(Yii::getPathOfAlias('common.typeahead.assets') . '/typeahead.js', CClientScript::POS_END);
			$hogan = CHtml::asset(Yii::getPathOfAlias('common.typeahead.assets') . '/hogan-2.0.0.js', CClientScript::POS_END);
		}
		Yii::app()->clientScript->registerScriptFile($url);
		Yii::app()->clientScript->registerScriptFile($hogan);
	}

	public function registerCssFile() {
		$css = CHtml::asset(Yii::getPathOfAlias('common.typeahead.assets') . '/typeahead.js-bootstrap.css');
		Yii::app()->clientScript->registerCssFile($css);
	}

	/**
	 * Runs the widget.
	 */
	public function run() {
		list($name, $id) = $this->resolveNameID();

		if (isset($this->htmlOptions['id']))
			$id = $this->htmlOptions['id'];
		else
			$this->htmlOptions['id'] = $id;

		if (isset($this->htmlOptions['name']))
			$name = $this->htmlOptions['name'];

		if ($this->hasModel())
			echo CHtml::activeTextField($this->model, $this->attribute, $this->htmlOptions);
		else
			echo CHtml::textField($name, $this->value, $this->htmlOptions);

		$options = !empty($this->options) ? CJavaScript::encode($this->options) : '';
		Yii::app()->clientScript->registerScript(__CLASS__ . '#' . $id, "jQuery('#{$id}').typeahead({$options});");
	}
}
