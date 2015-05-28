<?php
define('KC_FILE_COMMAND', '/usr/bin/file --mime-type -b "%s" ');

/**
 * Util Class
 * @author gongyou3@opda.cn
 */
class Util {

	/**
	 * Return the string value
	 * @param unknown_type $key
	 * @param unknown_type $defaultValue
	 */
	public static function stringValue($arr, $key, $defaultValue = '') {
		if (isset($arr->$key)) {
			$value = strval($arr->$key);
			if (mb_detect_encoding($value) != 'UTF-8') {
				$value = mb_convert_encoding($value, 'UTF-8');
			}
			if (get_magic_quotes_gpc()) {
				return stripslashes($value);
			}
			return $value;
		}
		return $defaultValue;
	}

	/**
	 * Return the int value
	 * @param unknown_type $key
	 * @param unknown_type $defaultValue
	 */
	public static function intValue($key, $defaultValue = 0) {
		if (isset($key)) {
			return intval($key);
		}
		return $defaultValue;
	}

	/**
	 * Return the mixed value
	 * @param unknown_type $key
	 * @param unknown_type $defaultValue
	 */
	public static function booleanValue($key, $defaultValue = FALSE) {
		if (isset($key)) {
			return $key;
		}
		return $defaultValue;
	}

	/**
	 * Get file mime type
	 * @param type $file
	 * @return string
	 */
	public static function getMime($file) {
		$mime = '';
		if (is_dir($file) || !file_exists($file)) {
			return '';
		}
		ob_start();
		passthru(sprintf(KC_FILE_COMMAND, $file));
		$mime = trim(ob_get_contents());
		ob_end_clean();
		if (!$mime) {
			if (function_exists('finfo_open')) {
				$finfo = finfo_open(FILEINFO_MIME);
				$mime = finfo_file($finfo, $file);
				finfo_close($finfo);
			} elseif (function_exists('mime_content_type')) {
				$mime = mime_content_type($file);
			}
		}
		return $mime;
	}

	/**
	 * Download image
	 * @static
	 * @param $mime
	 * @param $source
	 */
	public static function getDownloadImage($mime, $source) {
		$expire = 60 * 60 * 24 * 30; // seconds, minutes, hours, days
		header('Pragma: public');
		header('Expires: ' . gmdate('D, d M Y H:i:s', time() + $expire) . ' GMT');
		header('Cache-Control: max-age=' . $expire);
		header('Content-type: ' . $mime);
		header('X-Accel-Redirect: /data/' . $source);
		Yii::app()->end();
	}

	/**
	 * Download file
	 * @static
	 * @param $mime
	 * @param $filename
	 * @param $source
	 */
	public static function getDownloadFile($mime, $filename, $source) {
		header('Content-type: ' . $mime);
		$ua = isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : "";
		$encoded_filename = urlencode($filename);
		$encoded_filename = str_replace("+", "%20", $encoded_filename);
		if (preg_match("/MSIE/", $ua)) {
			header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');
		} else if (preg_match("/Firefox/", $ua)) {
			header('Content-Disposition: attachment; filename*="utf8\'\'' . $filename . '"');
		} else {
			header('Content-Disposition: attachment; filename="' . $filename . '"');
		}
		header('X-Accel-Limit-Rate: ' . Yii::app()->params['X-Accel-Limit-Rate']);
		header('X-Accel-Redirect: /data/' . $source);
		Yii::app()->end();
	}

	/**
	 * Check download url
	 * @static
	 * @param $id
	 * @return bool|string
	 */
	public static function checkDownloadId($id) {
		$md5 = substr($id, 0, 32);
		$id = substr($id, 32);
		return (md5($id . Yii::app()->params['TOKEN']) == $md5) ? $id : false;
	}

	public static function createTokenString($id) {
		return md5($id . Yii::app()->params['TOKEN']) . $id;
	}

	/**
	 * Output format of the file size
	 * @static
	 * @param $fileSize
	 * @return string
	 */
	public static function formatFileSize($fileSize, $num = 2) {
		$size = sprintf("%u", $fileSize);
		if ($size == 0) {
			return ("0Bytes");
		}
		$unit = array(
			"Bytes",
			"KB",
			"MB",
			"GB",
			"TB",
			"PB",
			"EB",
			"ZB",
			"YB"
		);
		return round($size / pow(1024, ($i = floor(log($size, 1024)))), $num) . $unit[$i];
	}

	public static function getIP() {
		if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
			$ip = getenv("HTTP_CLIENT_IP");
		} else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		} else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
			$ip = getenv("REMOTE_ADDR");
		} else if (isset ($_SERVER ['REMOTE_ADDR']) && $_SERVER ['REMOTE_ADDR'] && strcasecmp($_SERVER ['REMOTE_ADDR'], "unknown")) {
			$ip = $_SERVER ['REMOTE_ADDR'];
		} else {
			$ip = "unknown";
		}
		return ($ip == 'unknown' || ip2long($ip) === false || ip2long($ip) == -1) ? '0.0.0.0' : $ip;
	}

	public static function formatTime($the_time) {
		if (!isset($the_time) || empty($the_time))
			return '1秒前';

		$now_time = time();
		$show_time = strtotime($the_time);
		$bar = (int)$show_time;
		$dur = $now_time - $bar;

		if ($dur < 1) {
			return "1秒前";
		} else {
			if ($dur < 60) {
				return $dur . '秒前';
			} else {
				if ($dur < 3600) {
					return floor($dur / 60) . '分钟前';
				} else {
					if ($dur < 86400) {
						return floor($dur / 3600) . '小时前';
					} else {
						if ($dur < 604800) { //7天内
							$day = floor($dur / 86400);
							if ($day == 1)
								return '昨天';
							if ($day == 2)
								return '前天';
							return $day . '天前';
						} else {
							if ($dur < 2419200) { //1月内
								return floor($dur / 604800) . '周前';
							} else {
								return date('Y-m-d', strtotime($the_time));
							}
						}
					}
				}
			}
		}
	}

	public static function censorWords($text) {
		$key = 'badwords';
		$censorWords = array();
		$cacheBadWords = Yii::app()->cache->get($key);
		if ($cacheBadWords) {
			$censorWords = $cacheBadWords;
		} else {
			$criteria = new CDbCriteria();
			$criteria->order = 'id desc';
			$badWords = Badwords::model()->findAll($criteria);
			if ($badWords) {
				foreach ($badWords as $item) {
					$censorWords[] = $item->attributes;
				}
				Yii::app()->cache->set($key, $censorWords, 3600 * 24);
			}
		}
		foreach ($censorWords as $item) {
			if (preg_match('~' . $item['word'] . '~i', $text, $ma)) {
				return true;
			}
		}
		return false;
	}

	public static function imgMark($sourceImg, $markImg, $targetImg) {
		$sourceImgMessage = getimagesize($sourceImg); //获得图片的信息
		$sourceImgWidth = $sourceImgMessage[0]; //获取图片的宽度
		$sourceImgHeight = $sourceImgMessage[1]; //获取图片的高度
		/*判断图片的类型*/
		switch ($sourceImgMessage[2]) {
			case 1:
				$sourceImgMessage = @imagecreatefromGIF($sourceImg);
				break;
			case 2:
				$sourceImgMessage = @imagecreatefromjpeg($sourceImg);
				break;
			case 3:
				$sourceImgMessage = @imagecreatefrompng($sourceImg);
				break;
		}
		$markImgMessage = getimagesize($markImg); //获取水印图片的信息
		$markImgWidth = $markImgMessage[0]; //获取水印图片的宽度
		$markImgHeight = $markImgMessage[1]; //获取水印图片的高度

		switch ($markImgMessage[2]) {
			case 1:
				$markImgMessage = @imagecreatefromGIF($markImg);
				break;
			case 2:
				$markImgMessage = @imagecreatefromjpeg($markImg);
				break;
			case 3:
				$markImgMessage = @imagecreatefrompng($markImg);
				break;
		}
		imagecopy($sourceImgMessage, $markImgMessage, ($sourceImgWidth - $markImgWidth), ($sourceImgHeight - $markImgHeight), 0, 0, $markImgWidth, $markImgHeight); /*将水印图片放到我们需要打水印的图片上，并设定水印图片的位置！*/
		imagecolorallocate($sourceImgMessage, 255, 0, 255);
		if (imagejpeg($sourceImgMessage, $targetImg)) { //保存水印的图片。
			echo '添加水印成功';
		} else {
			echo '添加水印失败';
		}
	}

	public static function checkUserAgent($uaAccept, $uaRefuse) {
		$ua = isset($_SERVER['HTTP_USER_AGENT']) ? strtolower($_SERVER['HTTP_USER_AGENT']) : '';
		if (!empty($ua)) {
			if (!empty($uaAccept) && preg_match('/' . $uaAccept . '/i', $ua)) {
				return true;
			}
			if (!empty($uaRefuse) && preg_match('/' . $uaRefuse . '/i', $ua)) {
				return false;
			}
		}
		return true;
	}

	public static function autoRedirect($time = 1000, $url = null, $method = 'href', $target = '_self') {
		$url = isset($url) ? $url : Yii::app()->getHomeUrl();
		if ($method === 'open') {
			$js = '<script type="text/javascript">window.open("' . $url . '","' . $target . '")</script>';
		} else {
			$js = '<script type="text/javascript">setTimeout("window.location.href=\'' . $url . '\'", ' . $time . ')</script>';
		}
		return $js;
	}

	public static function robotFilter() {
		if (!isset($_SERVER['HTTP_USER_AGENT'])) {
			return false;
		}
		$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
		$robot = "/(baidu|google|spider|soso|yahoo|sohu-search|yodao|robozilla)/i";
		if (preg_match($robot, $agent)) {
			return true;
		}
		return false;
	}

	public static function getUrlPrefix($type, $id = 0) {
		if ($type == 'IMG' || $type == 'AVATAR') {
			$id = substr($id, -1);
			if ($id >= 0 && $id <= 3) {
				$imgid = 1;
			} elseif ($id > 3 && $id <= 5) {
				$imgid = 2;
			} elseif ($id > 5 && $id <= 7) {
				$imgid = 3;
			} elseif ($id > 7 && $id <= 9) {
				$imgid = 4;
			}
		}
		if ($type == 'DL' || $type == 'DL_HTTP') {
			$dlid = rand(1, 2);
//			$ip = Util::getIP();
//			$last = substr($ip, -1);
//			if ($last < 6) {
//				$dlid = 3;
//			}
		}
		switch ($type) {
			case 'IMG':
				//$url = 'http://img.opdatest.com/';
				$url = 'http://img' . $imgid . '.cdn.opda.com/';
				break;
			case 'AVATAR':
				$url = 'http://avatar' . $imgid . '.cdn.opda.com/';
				break;
			case 'DL':
				$url = 'zhuodashi://dl' . $dlid . '.cdn.opda.com:808/';
				break;
			case 'DL_HTTP':
				$url = 'http://dl' . $dlid . '.cdn.opda.com:808/';
				break;
		}
		return $url;
	}

	public static function random($length, $numeric = 0) {
		$seed = base_convert(md5(microtime() . $_SERVER['DOCUMENT_ROOT']), 16, $numeric ? 10 : 35);
		$seed = $numeric ? (str_replace('0', '', $seed) . '012340567890') : ($seed . 'zZ' . strtoupper($seed));
		$hash = '';
		$max = strlen($seed) - 1;
		for ($i = 0; $i < $length; $i++) {
			$hash .= $seed{mt_rand(0, $max)};
		}
		return $hash;
	}

	public static function switchGender($gender, $type = 0) {
		$genderArr = array(
			'm' => 1,
			'f' => 2,
			'n' => 0
		);
		if ($type) {
			$genderArr = array_flip($genderArr);
			return $genderArr[$gender];
		} else {
			return $genderArr[$gender];
		}
	}

	public static function getCurrentUrl() {
		return 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}

	public static function arraySort($array, $sort = SORT_DESC, $order) {
		if (is_array($array) && !empty($array)) {
			foreach ($array as $row) {
				$batchArr[] = $row[$order];
			}
			array_multisort($batchArr, $sort, $array);
			return $array;
		} else {
			return null;
		}
	}

	public static function switchPCArch($arch_id) {
		switch ($arch_id) {
			case 1:
				return '32位';
				break;
			case 2:
				return '64位';
				break;
			default:
				return '全平台';
				break;
		}
	}

	public static function mkdirs($path) {
		$dirarr = explode("/", $path);
		$dir = '';
		for ($i = 0; $i < count($dirarr); $i++) {
			$dir .= $dirarr [$i] . "/";
			if (!is_dir($dir)) {
				if (mkdir($dir, 0755)) {
					return true;
				} else {
					return false;
				}
			}
		}
	}

	public static function charCodeAt($c) {
		$h = ord($c{0});
		if ($h <= 0x7F) {
			return $h;
		} else if ($h < 0xC2) {
			return false;
		} else if ($h <= 0xDF) {
			return ($h & 0x1F) << 6 | (ord($c{1}) & 0x3F);
		} else if ($h <= 0xEF) {
			return ($h & 0x0F) << 12 | (ord($c{1}) & 0x3F) << 6
			| (ord($c{2}) & 0x3F);
		} else if ($h <= 0xF4) {
			return ($h & 0x0F) << 18 | (ord($c{1}) & 0x3F) << 12
			| (ord($c{2}) & 0x3F) << 6
			| (ord($c{3}) & 0x3F);
		} else {
			return false;
		}
	}

	public static function fromCharCode() {
		$output = '';
		$chars = func_get_args();
		foreach ($chars as $char) {
			$output .= chr((int)$char);
		}
		return $output;
	}

	public static function DesEncrypt($str, $key) {
		$block = mcrypt_get_block_size('des', 'ecb');
		$pad = $block - (strlen($str) % $block);
		$str .= str_repeat(chr($pad), $pad);
		return mcrypt_encrypt(MCRYPT_DES, $key, $str, MCRYPT_MODE_ECB);
	}

	public static function DesDecrypt($str, $key) {
		$str = mcrypt_decrypt(MCRYPT_DES, $key, $str, MCRYPT_MODE_ECB);
		$block = mcrypt_get_block_size('des', 'ecb');
		$pad = ord($str[($len = strlen($str)) - 1]);
		return substr($str, 0, strlen($str) - $pad);
	}

	public static function isMobile() {
		switch (TRUE) {
			// Apple/iPhone browser renders as mobile
			case (preg_match('/(apple|iphone|ipod)/i', $_SERVER['HTTP_USER_AGENT']) && preg_match('/mobile/i', $_SERVER['HTTP_USER_AGENT'])):
				return true;
				break;

			// Other mobile browsers render as mobile
			case (preg_match('/(android|blackberry|configuration\/cldc|hp |hp-|htc |htc_|htc-|iemobile|kindle|midp|mmp|motorola|mobile|nokia|opera mini|opera   mobi|palm|palmos|pocket|portalmmm|ppc;|smartphone|sonyericsson|sqh|spv|symbian|treo|up.browser|up.link|vodafone|windows ce|xda |xda_)/i', $_SERVER['HTTP_USER_AGENT'])):
				return true;
				break;

			// Wap browser
			case (((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'text/vnd.wap.wml') > 0) || (strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') > 0)) || ((isset($_SERVER['HTTP_X_WAP_PROFILE']) || isset($_SERVER['HTTP_PROFILE'])))):
				return true;
				break;

			// Shortend user agents
			case (in_array(strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 3)), array(
				'lg ' => 'lg ',
				'lg-' => 'lg-',
				'lg_' => 'lg_',
				'lge' => 'lge'
			)));
				return true;
				break;

			// More shortend user agents
			case(in_array(strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4)), array(
				'acs-' => 'acs-',
				'amoi' => 'amoi',
				'doco' => 'doco',
				'eric' => 'eric',
				'huaw' => 'huaw',
				'lct_' => 'lct_',
				'leno' => 'leno',
				'mobi' => 'mobi',
				'mot-' => 'mot-',
				'moto' => 'moto',
				'nec-' => 'nec-',
				'phil' => 'phil',
				'sams' => 'sams',
				'sch-' => 'sch-',
				'shar' => 'shar',
				'sie-' => 'sie-',
				'wap_' => 'wap_',
				'zte-' => 'zte-'
			)));
				return true;
				break;
//
//			// Render mobile site for mobile search engines
//			case (preg_match('/Googlebot-Mobile/i', $_SERVER['HTTP_USER_AGENT']) || preg_match('/YahooSeeker\/M1A1-R2D2/i', $_SERVER['HTTP_USER_AGENT'])):
//				$browser = "mobile";
//				break;
		}
		return false;
	}

	public static function isIE() {
		if (isset($_SERVER['HTTP_USER_AGENT']) &&
			(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)
		) {
			return true;
		} else {
			return false;
		}
	}

	public static function checkIp($ip = '0.0.0.0', $start = '10.0.0.1', $end = '10.0.0.254') {
		if ($ip != '0.0.0.0') {
			$start = ip2long($start);
			$end = ip2long($end);
			$ip = ip2long($ip);
			if ($ip <= $end && $ip >= $start) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	//获取两个时间戳之间的间隔，返回数组
	public static function timeDiff($first_time, $second_time) {
		$time_diff = $first_time - $second_time;
		$days = intval($time_diff / 86400);
		$remain = $time_diff % 86400;
		$hours = intval($remain / 3600);
		$remain = $remain % 3600;
		$mins = intval($remain / 60);
		$secs = $remain % 60;
		$result = array(
			"day" => $days,
			"hour" => $hours,
			"min" => $mins,
			"sec" => $secs
		);
		return $result;
	}

	public static function checkImei($imei) {
		if (!preg_match('/^[0-9]{15}$/', $imei)) return false;
		if ($imei == '000000000000000') return false;
		$sum = 0;
		for ($i = 0; $i < 14; $i++) {
			$num = $imei[$i];
			if (($i % 2) != 0) {
				$num = $imei[$i] * 2;
				if ($num > 9) {
					$num = (string)$num;
					$num = $num[0] + $num[1];
				}
			}
			$sum += $num;
		}
		if ((($sum + $imei[14]) % 10) != 0) return false;
		return true;
	}

	public static function renderAvatar($url = 'did', $id = false, $nickname = '', $type = 'small', $lazy = true) {
		$alt = $nickname . '的头像';
		if ($id) {
			if ($lazy)
				return CHtml::link(CHtmlExt::lazyImage(Util::getUrlPrefix('AVATAR') . 'user/default', $alt), Yii::app()->createUrl('user/info', array($url => $id)));
			else
				return CHtml::link(CHtmlExt::image(Util::getUrlPrefix('AVATAR') . 'user/default', $alt), Yii::app()->createUrl('user/info', array($url => $id)));
//			if ($lazy)
//				return CHtml::link(CHtmlExt::lazyImage(Util::getUrlPrefix('AVATAR', $id . '/type/' . $type . '/' . $url . '/' . $id)), Yii::app()->createUrl('user/info', array($url => $id)));
//			else
//				return CHtml::link(CHtmlExt::image(Util::getUrlPrefix('AVATAR', $id . '/type/' . $type . '/' . $url . '/' . $id)), Yii::app()->createUrl('user/info', array($url => $id)));
		} else {
			if ($lazy)
				return CHtmlExt::lazyImage(Util::getUrlPrefix('AVATAR') . 'user/default', $alt);
			else
				return CHtml::image(Util::getUrlPrefix('AVATAR') . 'user/default', $alt);
		}
	}

	public static function renderNickname($url = 'did', $id = false, $nickname = '') {
		return CHtml::link(CHtml::encode($nickname), Yii::app()->createUrl('/user/info', array($url => $id)), array('target' => '_blank'));
	}

	public static function getIpAcc($ip) {
		$ipacc = '';
		$snoopy = new Snoopy;
		$snoopy->fetch('http://219.148.21.7:8090/nethelp691he/xbuserinfo.jsp?ip=' . $ip);
		if ($snoopy->status == '200') {
			$info = explode('#', $snoopy->results);
			$ipacc_info = explode('=', $info[2]);
			$ipacc = $ipacc_info[1];
		}
		return $ipacc;
	}

	public static function isWeiXin() {
		if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'micromessenger') !== false) {
			return true;
		}
		return false;
	}

	public static function isAndroid() {
		if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'android') !== false) {
			return true;
		}
		return false;
	}

	public static function getGameUser() {
		$prefix = '4game';
		$rand = Util::random(5, 1);
		return str_pad($prefix . ((int)$rand), 10, 0);
	}

	public static function arrayInsert($base_array, $insert_array, $place) {
		$temp_array = ($place == 0) ? array() : array_slice($base_array, 0, $place);
		$temp_array[] = $insert_array;
		$temp_reset_array = array_slice($base_array, $place);
		$final_array = array_merge($temp_array, $temp_reset_array);
		return $final_array;
	}

}

?>
