<?php
/**
 * Created by JetBrains PhpStorm.
 * User: peipei
 * Date: 14-2-18
 * Time: 下午3:45
 * To change this template use File | Settings | File Templates.
 */
class swipeDemo extends CWidget {

	public $result = array();
	public $title = array();
	public $pages_info = array();
	public $type = 'ad';

	public function run() {
		$this->render('swipeDemo', array(
		                                'type' => $this->type,
		                                'result' => $this->result,
		                                'title' => $this->title,
		                                'pages_info' => $this->pages_info
		                           ));
	}
}