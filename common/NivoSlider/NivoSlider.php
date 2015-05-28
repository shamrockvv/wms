<?php

class NivoSlider extends CWidget {
	public $id;
	public $htmlOptions = array();
	public $theme = 'fancy'; //default,light,dark,bar,fancy
	public $cssFile;
	public $test;
	public $config = array();
	public $images = array();

	public function init() {
		if (isset($this->id)) {
			$this->htmlOptions['id'] = $this->id;
		} else {
			$this->htmlOptions['id'] = $this->getId();
		}
		$this->publishAssets();
	}

	public function run() {
		echo CHtml::openTag('div', array('class' => 'nivo-theme theme-' . $this->theme)) . "\n";
		echo CHtml::openTag('div', $this->htmlOptions) . "\n";

		if (count($this->images)) {
			$this->renderImages($this->images);
		}
		echo CHtml::closeTag('div') . "\n";
		echo CHtml::closeTag('div') . "\n";
		$config = array(
			'effect' => 'random',
			'slices' => 15,
			'boxCols' => 8,
			'boxRows' => 4,
			'animSpeed' => 500,
			'pauseTime' => 6000,
			'startSlide' => 0,
			'directionNav' => true,
			'controlNav' => true,
			'controlNavThumbs' => false,
			'pauseOnHover' => true,
			'manualAdvance' => false,
			'prevText' => 'Prev',
			'nextText' => 'Next',
			'randomStart' => false,
			'beforeChange' => 'js:function(){}',
			'afterChange' => 'js:function(){}',
			'slideshowEnd' => 'js:function(){}',
			'lastSlide' => 'js:function(){}',
			'afterLoad' => 'js:function(){}',
		);
		$config = array_merge($config, $this->config);
		$config = CJavaScript::encode($config);
		Yii::app()->getClientScript()->registerScript(uniqid(), "
			$('#" . $this->htmlOptions['id'] . "').nivoSlider($config);
		");
	}

	public function renderImages($items) {
		foreach ($items as $item) {
			if (isset($item['caption'])) {
				$item['imageOptions']['title'] = $item['caption'];
			}
			if (isset($item['lazyImage'])) {
				echo CHtml::link($item['lazyImage'], $item['url'], $item['linkOptions']) . "\n";
			}elseif (isset($item['url'])) {
				echo CHtml::link(CHtml::image($item['src'], $item['caption'], $item['imageOptions']), $item['url'], $item['linkOptions']) . "\n";
			} else {
				echo CHtml::image($item['src'], $item['caption'], $item['imageOptions']) . "\n";
			}
		}
	}

	public function publishAssets() {
		$assets = dirname(__FILE__) . '/assets';
		$baseUrl = Yii::app()->assetManager->publish($assets);
		if (is_dir($assets)) {
			Yii::app()->clientScript->registerCoreScript('jquery');
			Yii::app()->clientScript->registerScriptFile($baseUrl . '/jquery.nivo.slider.pack.js', CClientScript::POS_END);
			Yii::app()->clientScript->registerCssFile($baseUrl . '/nivo-slider.css');
			if (isset($this->cssFile)) {
				Yii::app()->clientScript->registerCssFile($this->cssFile);
			}
			Yii::app()->clientScript->registerCssFile($baseUrl . '/themes/' . $this->theme . '/nivo-theme.css');
		} else {
			throw new Exception('CNivoSlider - Error: Couldn\'t publish assets.');
		}
	}
}
