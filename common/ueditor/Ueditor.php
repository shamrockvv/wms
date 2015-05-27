<?php

/**
 *
 */
class Ueditor extends CInputWidget {

	/******* widget private vars *******/
	private $baseUrl = null;
	private $jsFiles = array(
		'/editor_config.js',
		'/editor_all_min.js',
	);
	private $cssFiles = array(
		'/themes/default/css/ueditor.css',
	);
	public $getId = 'editor';
	public $options = NULL;
	public $admin = true;
	public $imageUrl = '';
	public $imageManagerUrl = '';
	public $imageManagerPath = '';
	public $fileUrl = '';
	public $toolbars = '';

	public $UEDITOR_HOME_URL = '/';


	/**
	 * Initialize the widget
	 */
	public function init() {
		//Publish assets
		$this->publishAssets();
		$this->generateOptions();
		$this->registerClientScripts();
		parent::init();
	}

	/**
	 * Publishes the assets
	 */
	public function publishAssets() {
		$dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'ueditor1_2_4_0';
		$this->baseUrl = Yii::app()->getAssetManager()->publish($dir);
	}

	/**
	 * Registers the external javascript files
	 */
	public function registerClientScripts() {
		if ($this->baseUrl === '')
			throw new CException(Yii::t('Ueditor', 'baseUrl must be set. This is done automatically by calling publishAssets()'));
		//Register the main script files
		$cs = Yii::app()->getClientScript();
		foreach ($this->jsFiles as $jsFile) {
			$ueditorJsFile = $this->baseUrl . $jsFile;
			$cs->registerScriptFile($ueditorJsFile, CClientScript::POS_HEAD);
		}
		// add the css
		foreach ($this->cssFiles as $cssFile) {
			$ueditorCssFile = $this->baseUrl . $cssFile;
			$cs->registerCssFile($ueditorCssFile);
		}
		//Register the widget-specific script on ready
		$js = $this->generateOnloadJavascript();
		$cs->registerScript('ueditor' . $this->getId, $js, CClientScript::POS_END);
	}

	protected function generateOptions() {
		if ($this->imageUrl == null)
			$this->imageUrl = Yii::app()->createUrl('image/attach', array('c' => $this->controller->id));
		if ($this->fileUrl == null)
			$this->fileUrl = 'http://dl.kfkx.net' . Yii::app()->createUrl('file/attach');
		if ($this->options == null) {
			if ($this->admin) {
				if (empty($this->toolbars)) {
					$this->toolbars = '"fullscreen", "source", "|", "undo", "redo", "|",
                "bold", "italic", "underline", "strikethrough", "superscript", "subscript", "removeformat", "formatmatch","autotypeset", "|",
                "blockquote", "|", "pasteplain", "|", "forecolor", "backcolor", "insertorderedlist", "insertunorderedlist","selectall", "cleardoc", "|", "customstyle",
                "paragraph", "|","rowspacingtop", "rowspacingbottom","lineheight", "|","fontfamily", "fontsize", "|",
                "directionalityltr", "directionalityrtl", "|", "", "indent", "|",
                "justifyleft", "justifycenter", "justifyright", "justifyjustify", "|",
                "link", "unlink", "anchor", "|", "imagenone", "imageleft", "imageright",
                "imagecenter", "|", "insertimage", "emotion", "insertvideo", "attachment", "map", "gmap", "insertframe","highlightcode","pagebreak", "|",
                "horizontal", "date", "time", "spechars","snapscreen", "wordimage", "|",
                "inserttable", "deletetable", "insertparagraphbeforetable", "insertrow", "deleterow", "insertcol", "deletecol", "mergecells", "mergeright", "mergedown", "splittocells", "splittorows", "splittocols", "|",
                "print", "preview", "searchreplace"';
				} else {
					$this->toolbars = implode(',', $this->toolbars);
					$this->toolbars = '"' . str_replace(',', '","', $this->toolbars) . '"';
				}
				$this->options =
					'
					toolbars:[[' . $this->toolbars . ']],
                        elementPathEnabled:false,
                        initialContent:"",
                        imageUrl:"' . $this->imageUrl . '",
                        imageManagerUrl:"' . $this->imageManagerUrl . '",
                        imageManagerPath:"' . $this->imageManagerPath . '",
                        imagePath:"",
                        fileUrl:"' . $this->fileUrl . '",
                        filePath:"",
                        maximumWords:65535
                        ';
			} else {
				if (empty($this->toolbars)) {
					$this->toolbars = '"undo", "redo", "|",
                "bold", "italic", "underline", "strikethrough", "superscript", "subscript", "removeformat", "formatmatch","autotypeset", "|",
                "pasteplain", "|", "forecolor", "backcolor", "insertorderedlist", "insertunorderedlist","selectall","|","fontfamily", "fontsize", "|",
                "justifyleft", "justifycenter", "justifyright", "justifyjustify", "|",
                "link", "unlink","|", "imagenone", "imageleft", "imageright",
                "imagecenter", "|", "insertimage", "emotion","|",
                "horizontal", "date", "time", "spechars","snapscreen", "wordimage", "|",
                "inserttable", "deletetable", "insertparagraphbeforetable", "insertrow", "deleterow", "insertcol", "deletecol", "mergecells", "mergeright", "mergedown", "splittocells", "splittorows", "splittocols", "|"';

				} else {
					$this->toolbars = implode(',', $this->toolbars);
					$this->toolbars = '"' . str_replace(',', '"," ', $this->toolbars) . '"';
				}

				$this->options =
					'toolbars:[[' . $this->toolbars . ']],
                        elementPathEnabled:false,
                        initialContent:"",
                        imageUrl:"' . $this->imageUrl . '",
                        imageManagerUrl:"' . $this->imageManagerUrl . '",
                        imageManagerPath:"' . $this->imageManagerPath . '",
                        imagePath:"",
                        fileUrl:"' . $this->fileUrl . '",
                        filePath:"",
                        maximumWords:65535,
                        initialFrameWidth:666
                        ';
			}
		}
	}

	protected function generateOnloadJavascript() {
		$js = "var editor = new baidu.editor.ui.Editor({UEDITOR_HOME_URL:'" . $this->baseUrl . $this->UEDITOR_HOME_URL . "'," . $this->options . "});";
		$js .= "editor.render('$this->getId');";
		return $js;
	}

	/**
	 * Run the widget
	 */
	public function run() {
		$this->htmlOptions = array_merge($this->htmlOptions, array('id' => $this->getId));
		if ($this->hasModel()) {
			echo CHtml::activeTextArea($this->model, $this->attribute, $this->htmlOptions);
		} else {
			echo CHtml::textArea($this->name, $this->value, $this->htmlOptions);
		}
		parent::run();
	}
}
