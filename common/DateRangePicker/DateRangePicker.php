<?php
Yii::import('zii.widgets.jui.CJuiInputWidget');
/**
 * DateRangePicker displays a datepicker.
 *
 *
 * To use this widget, you may insert the following code in a view:
 * <pre>
 * $this->widget('common.DateRangePicker', array(
 *     'name'=>'publishDate',
 *     // additional javascript options for the date picker plugin
 *     'options'=>array(
 *         'arrows'=>true,
 *     ),
 *     'htmlOptions'=>array(
 *         'style'=>'height:20px;'
 *     ),
 * ));
 * </pre>
 *
 *
 */
class DateRangePicker extends CJuiInputWidget {

	public $custom = false;
	public $cxdate = '';
	/**
	 * @var array The default options called just one time per request. This options will alter every other CJuiDatePicker instance in the page.
	 * It has to be set at the first call of CJuiDatePicker widget in the request.
	 */
	public $defaultOptions = array(
		'locale' => array(
			'applyLabel' => '确定',
			'clearLabel' => '清除',
			'fromLabel' => '开始时间',
			'toLabel' => '结束时间',
			'weekLabel' => '周',
			'customRangeLabel' => '自定义',
			'daysOfWeek' => array('日', '一', '二', '三', '四', '五', '六'),
			'monthNames' => array('一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'),
			'firstDay' => 0
		),
		'format' => 'yyyy-MM-dd',
		'ranges' => array(
			'最近7天' => array('js:Date.today().add({ days: -6 })', 'today'),
			'最近30天' => array('js:Date.today().add({ days: -29 })', 'today'),
			'本月' => array('js:Date.today().moveToFirstDayOfMonth()', 'js:Date.today().moveToLastDayOfMonth()'),
		)
	);

	public function init() {
		parent::init();
		$this->registerScripts();
	}

	/**
	 * Run this widget.
	 * This method registers necessary javascript and renders the needed HTML code.
	 */
	public function run() {
		list($name, $id) = $this->resolveNameID();

		if (isset($this->htmlOptions['id']))
			$id = $this->htmlOptions['id'];
		else
			$this->htmlOptions['id'] = $id;
		if (isset($this->htmlOptions['name']))
			$name = $this->htmlOptions['name'];
		else
			$this->htmlOptions['name'] = $name;

		$options = CJavaScript::encode(array_merge($this->defaultOptions, $this->options));

		if ($this->hasModel())
			echo CHtml::activeTextField($this->model, $this->attribute, $this->htmlOptions);
		else
			if ($this->custom) {
				if (!empty($this->value)) {
					$init = $this->value;
				} elseif ($this->cxdate != '') {
					$init = $this->cxdate;
				} else {
					$init = date('Y-m-d', strtotime('-1 days'));
				}
				$content = CHtml::tag('i', array(
				                                'class' => 'icon-calendar icon-large',
				                                'style' => 'margin-right:5px;'
				                           ), '') . CHtml::tag('span', array(), $init) . CHtml::tag('b', array(
				                                                                                              'class' => 'caret',
				                                                                                              'style' => 'margin-top:8px;margin-left:5px;'
				                                                                                         ), '');
				$options = $options . ',' . CJavaScript::encode('js:function(start, end){$("#' . $id . ' span").html(start.toString("yyyy-MM-dd") + " - " + end.toString("yyyy-MM-dd"));}');
				echo CHtml::tag('div', $this->htmlOptions, $content);
			} else {
				echo CHtml::textField($name, $this->value, $this->htmlOptions);
			}

		$js = "jQuery('#{$id}').daterangepicker($options);";

		$cs = Yii::app()->getClientScript();
		$cs->registerScript(__CLASS__ . '#' . $id, $js, CClientScript::POS_READY);
	}

	protected function registerScripts() {
		$basePath = Yii::getPathOfAlias('common.DateRangePicker.assets');
		$baseUrl = Yii::app()->getAssetManager()->publish($basePath);

		$script = array('/daterangepicker.min.js', '/date.min.js');
		$cssFile = '/daterangepicker.css';

		$cs = Yii::app()->clientScript;
		foreach ($script as $scriptFile) {
			$cs->registerScriptFile($baseUrl . $scriptFile);
		}
		$cs->registerCssFile($baseUrl . $cssFile);
	}

}

?>