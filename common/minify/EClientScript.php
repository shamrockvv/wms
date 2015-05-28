<?php
/**
 * Extended Client Script Manager Class File
 *
 * @author Hightman <hightman2[at]yahoo[dot]com[dot]cn>
 * @author Muayyad Alsadi <alsadi[at]gmail>
 *
 * @link http://www.czxiu.com/
 * @copyright hightman
 * @license http://www.yiiframework.com/license/
 * @version 1.5
 */

/**
 * Extended clientScript to combine script and css files automatically
 *
 * @author hightman <hightman2@yahoo.com.cn>
 * @version 1.5
 * @package extensions.minify
 */
class EClientScript extends CClientScript {
	/**
	 * @var combined script file name
	 */
	public $scriptFileName = 'script.js';

	/**
	 * @var combined css stylesheet file name
	 */
	public $cssFileName = 'style.css';

	/**
	 * @var boolean if to combine the script files or not
	 */
	public $combineScriptFiles = true;

	/**
	 * @var boolean if to combine the css files or not
	 */
	public $combineCssFiles = true;

	/**
	 * @var boolean if to optimize the css files
	 */
	public $optimizeCssFiles = false;

	/**
	 * @var boolean if to optimize the script files via googleCompiler(this may cause to much slower)
	 */
	public $optimizeScriptFiles = false;

	/**
	 * @var array local base path & url
	 */
	private $_baseUrlMap = array();

	/**
	 * @var string base request url
	 */
	private $_baseUrl;

	/**
	 * init
	 */
	public function init() {
		if (Util::isIE()) $this->combineCssFiles = false;
		// request
		$this->_baseUrl = Yii::app()->request->baseUrl;
		$baseUrl = $this->_baseUrl . '/';
		$basePath = dirname(Yii::app()->request->scriptFile) . DIRECTORY_SEPARATOR;
		$this->_baseUrlMap[$baseUrl] = $basePath;
		// themes
		if (Yii::app()->theme) {
			$basePath = Yii::app()->theme->basePath . DIRECTORY_SEPARATOR;
			$baseUrl = Yii::app()->theme->baseUrl . '/';
			$this->_baseUrlMap[$baseUrl] = $basePath;
		}
		parent::init();
	}

	/**
	 * Change default of script position to CClinetScript::POS_END
	 */
	public function registerScriptFile($url, $position = self::POS_END, array $htmlOptions = array()) {
		if (substr($url, 0, 1) !== '/' && strpos($url, '://') === false)
			$url = $this->_baseUrl . '/' . $url;
		return parent::registerScriptFile($url, $position, $htmlOptions);
	}

	public function registerCssFile($url, $media = '') {
		if (substr($url, 0, 1) !== '/' && strpos($url, '://') === false)
			$url = $this->_baseUrl . '/' . $url;
		parent::registerCssFile($url, $media);
	}

	/**
	 * Add \t into script codes of READY
	 */
	public function registerScript($id, $script, $position = self::POS_READY, array $htmlOptions = array()) {
		if ($position === self::POS_READY)
			$script = "\t" . str_replace("\n", "\n\t", $script);
		parent::registerScript($id, $script, $position, $htmlOptions);
	}

	public function render(&$output) {
		parent::render($output);
		// conditional js/css for IE
		if ($this->hasScripts)
			$output = preg_replace('#(<(?:link|script) .+?) media="([lg]te? IE \d+)"(.*?>(?:</script>)?)#', '<!--[if \2]>\1\3<![endif]-->', $output);
	}

	/**
	 * Combine css files and script files before renderHead.
	 * @param string the output to be inserted with scripts.
	 */
	public function renderHead(&$output) {
		if ($this->combineCssFiles)
			$this->combineCssFiles();
		if ($this->combineScriptFiles && $this->enableJavaScript)
			$this->combineScriptFiles(self::POS_HEAD);
		parent::renderHead($output);
	}

	/**
	 * Inserts the scripts at the beginning of the body section.
	 * @param string the output to be inserted with scripts.
	 */
	public function renderBodyBegin(&$output) {
		// $this->enableJavascript has been checked in parent::render()
		if ($this->combineScriptFiles)
			$this->combineScriptFiles(self::POS_BEGIN);
		parent::renderBodyBegin($output);
	}

	/**
	 * Inserts the scripts at the end of the body section.
	 * @param string the output to be inserted with scripts.
	 */
	public function renderBodyEnd(&$output) {
		// $this->enableJavascript has been checked in parent::render()
		if ($this->combineScriptFiles)
			$this->combineScriptFiles(self::POS_END);
		parent::renderBodyEnd($output);
	}

	/**
	 * Combine the CSS files, if cached enabled then cache the result so we won't have to do that
	 * Every time
	 */
	protected function combineCssFiles() {
		// Check the need for combination
		if (count($this->cssFiles) < 2)
			return;

		$cssFiles = array();
		$toCombine = array();
		foreach ($this->cssFiles as $url => $media) {
			$file = $this->getLocalPath($url);
			if ($file === false)
				$cssFiles[$url] = $media;
			else {
				if ($media === '')
					$media = 'all';
				if (!isset($toCombine[$media]))
					$toCombine[$media] = array();
				$toCombine[$media][$url] = $file;
			}
		}

		foreach ($toCombine as $media => $files) {
			if ($media === 'all')
				$media = '';
			if (count($files) === 1)
				$url = key($files);
			else {
				// get unique combined filename
				$fname = $this->getCombinedFileName($this->cssFileName, $files, $media);
				$fpath = Yii::app()->assetManager->basePath . DIRECTORY_SEPARATOR . $fname;
				// check exists file
				if (($valid = file_exists($fpath)) === true) {
					$mtime = filemtime($fpath);
					foreach ($files as $file) {
						if ($mtime < filemtime($file)) {
							$valid = false;
							break;
						}
					}
				}
				// re-generate the file
				if (!$valid) {
					$urlRegex = '#url\s*\(\s*([\'"])?(?!/|http://)([^\'"\s])#i';
					$fileBuffer = '';
					$charsetLine = '';
					foreach ($files as $url => $file) {
						$contents = file_get_contents($file);
						if ($contents) {
							// Reset relative url() in css file
							if (preg_match($urlRegex, $contents)) {
								$reurl = $this->getRelativeUrl(Yii::app()->assetManager->baseUrl, dirname($url));
								$contents = preg_replace($urlRegex, 'url(${1}' . $reurl . '/${2}', $contents);
							}
							// Check @charset line
							if (preg_match('/@charset\s+"(.+?)";?/', $contents, $matches)) {
								if ($charsetLine === '')
									$charsetLine = '@charset "' . $matches[1] . '"' . ";\n";
								$contents = preg_replace('/@charset\s+"(.+?)";?/', '', $contents);
							}

							// Append the contents to the fileBuffer
							if ($this->optimizeCssFiles
								&& strpos($file, '.min.') === false && strpos($file, '.pack.') === false
							) {
								$fileBuffer .= ", Original size: " . number_format(strlen($contents)) . ", Compressed size: ";
								$contents = $this->optimizeCssCode($contents);
								$fileBuffer .= number_format(strlen($contents));
							}
							$fileBuffer .= $contents . "\n\n";
						}
					}
					file_put_contents($fpath, $charsetLine . $fileBuffer);
				}
				// real url of combined file
				$url = Yii::app()->assetManager->baseUrl . '/' . $fname . '?' . filemtime($fpath);
			}
			$cssFiles[$url] = $media;
		}
		// use new cssFiles list replace old ones
		$this->cssFiles = $cssFiles;
	}

	/**
	 * Combine script files, we combine them based on their position, each is combined in a separate file
	 * to load the required data in the required location.
	 * @param $type CClientScript the type of script files currently combined
	 */
	protected function combineScriptFiles($type = self::POS_HEAD) {
		// Check the need for combination
		if (!isset($this->scriptFiles[$type]) || count($this->scriptFiles[$type]) < 2)
			return;

		$toCombine = array();
		$indexCombine = 0;
		$scriptName = $scriptValue = array();
		foreach ($this->scriptFiles[$type] as $url => $value) {
			if (is_array($value) || !($file = $this->getLocalPath($url))) {
				$scriptName[] = $url;
				$scriptValue[] = $value;
			} else {
				if (count($toCombine) === 0) {
					$indexCombine = count($scriptName);
					$scriptName[] = $url;
					$scriptValue[] = $url;
				}
				$toCombine[$url] = $file;
			}
		}
		if (count($toCombine) > 1) {
			// get unique combined filename
			$fname = $this->getCombinedFileName($this->scriptFileName, array_values($toCombine), $type);
			$fpath = Yii::app()->assetManager->basePath . DIRECTORY_SEPARATOR . $fname;
			// check exists file
			if (($valid = file_exists($fpath)) === true) {
				$mtime = filemtime($fpath);
				foreach ($toCombine as $file) {
					if ($mtime < filemtime($file)) {
						$valid = false;
						break;
					}
				}
			}
			// re-generate the file
			if (!$valid) {
				$fileBuffer = '';
				foreach ($toCombine as $url => $file) {
					$contents = file_get_contents($file);
					if ($contents) {
						// Append the contents to the fileBuffer
						if ($this->optimizeScriptFiles
							&& strpos($file, '.min.') === false && strpos($file, '.pack.') === false
						) {
							$fileBuffer .= ", Original size: " . number_format(strlen($contents)) . ", Compressed size: ";
							$contents = $this->optimizeScriptCode($contents);
							$fileBuffer .= number_format(strlen($contents));
						}
						$fileBuffer .= $contents . "\n\n";
					}
				}
				file_put_contents($fpath, $fileBuffer);
			}
			// add the combined file into scriptFiles
			$url = Yii::app()->assetManager->baseUrl . '/' . $fname . '?' . filemtime($fpath);
			$scriptName[$indexCombine] = $url;
			$scriptValue[$indexCombine] = $url;
		}
		// use new scriptFiles list replace old ones
		$this->scriptFiles[$type] = array_combine($scriptName, $scriptValue);
	}

	/**
	 * Get realpath of published file via its url, refer to {link: CAssetManager}
	 * @return string local file path for this script or css url
	 */
	private function getLocalPath($url) {
		foreach ($this->_baseUrlMap as $baseUrl => $basePath) {
			if (!strncmp($url, $baseUrl, strlen($baseUrl)))
				return $basePath . substr($url, strlen($baseUrl));
		}
		return false;
	}

	/**
	 * Calculate the relative url
	 * @param string $from source url, begin with slash and not end width slash.
	 * @param string $to dest url
	 * @return string result relative url
	 */
	private function getRelativeUrl($from, $to) {
		$relative = '';
		while (true) {
			if ($from === $to)
				return $relative;
			else if ($from === dirname($from))
				return $relative . substr($to, 1);
			if (!strncmp($from . '/', $to, strlen($from) + 1))
				return $relative . substr($to, strlen($from) + 1);
			$from = dirname($from);
			$relative .= '../';
		}
	}

	/**
	 * Get unique filename for combined files
	 * @param string $name default filename
	 * @param array $files files to be combined
	 * @param string $type css media or script position
	 * @return string unique filename
	 */
	private function getCombinedFileName($name, $files, $type = '') {
		$raw = '';
		foreach ($files as $file) {
			$raw .= "\0" . $file . "\0" . @filemtime($file);
		}
		$ext = ($type === '' ? '' : '-' . $type) . '-' . base64_encode(md5($raw, true));
		$pos = strrpos($name, '.');
		$name = $pos === false ? $name . $ext : substr_replace($name, $ext, $pos, 0);
		return strtr($name, '+=/ ', '--__');
	}

	/**
	 * Optmize css, strip any spaces and newline
	 * @param string $data input css data
	 * @return string optmized css data
	 */
	private function optimizeCssCode($code) {
		require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'CssMin.php';
		return CssMin::minify($code, array(), array('CompressUnitValues' => true));
	}

	/**
	 * Optimize script via google compiler
	 * @param string $data script code
	 * @return string optimized script code
	 */
	private function optimizeScriptCode($code) {
		require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'JSMinPlus.php';
		$minified = JSMinPlus::minify($code);
		return ($minified === false ? $code : $minified);
	}
}
