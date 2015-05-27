<?php

class CHtmlExt extends CHtml {

	public static function lazyImage($src, $alt = '', $htmlOptions = array()) {
		if (!Util::robotFilter()) {
			$htmlOptions['src'] = Yii::app()->request->baseUrl . '/static/images/lazy.gif';
			$htmlOptions['data-src'] = $src;
			if (isset($htmlOptions['class']))
				$htmlOptions['class'] .= ' lazy';
			else
				$htmlOptions['class'] = 'lazy';
		} else {
			$htmlOptions['src'] = $src;
		}
		$htmlOptions['alt'] = $alt;
		return self::tag('img', $htmlOptions);
	}
}