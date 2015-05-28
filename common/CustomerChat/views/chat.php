<?php
/**
 * Created by JetBrains PhpStorm.
 * User: peipei
 * Date: 13-3-19
 * Time: 下午3:49
 * To change this template use File | Settings | File Templates.
 */
$assets = dirname(__FILE__) . '/assets';
$baseUrl = Yii::app()->assetManager->publish($assets);
Yii::app()->clientScript->registerScriptFile($baseUrl . '/jquery.js');
Yii::app()->clientScript->registerCssFile($baseUrl . '/chatbox.css');
Yii::app()->clientScript->registerScriptFile($baseUrl . '/welive.js');
?>
<body onkeydown="ctrlEnter(event)">
<?php
echo CHtml::openTag('div', array('id' => 'sounder', 'style' => 'width:0;height:0;visibility:hidden;overflow:hidden;'));
echo CHtml::closeTag('div');
echo CHtml::openTag('div', array('id' => 'guest'));
echo CHtml::openTag('div', array('id' => 'guest_top'));
echo CHtml::openTag('div', array('class' => 'logo'));
echo 'WeLive在线客服系统';
echo CHtml::closeTag('div');

echo CHtml::openTag('div', array('id' => 'guestinfo'));
echo CHtml::openTag('span', array('class' => 'spec'));
echo $username . ',';
echo CHtml::closeTag('span');
echo "欢迎您进入客服聊天系统！";
echo CHtml::closeTag('div');

echo CHtml::openTag('div', array('class' => 'timer_div'));
echo CHtml::openTag('span', array('id' => 'timer'));
echo '00:00';
echo CHtml::closeTag('span');
echo CHtml::closeTag('div');
echo CHtml::closeTag('div');

echo CHtml::openTag('div', array('class' => 'ico_history'));
echo CHtml::image("$baseUrl/images/history.gif");
echo CHtml::closeTag('div');

echo CHtml::openTag('div', array('id' => 'history'));
echo CHtml::closeTag('div');

echo CHtml::openTag('div', array('class' => 'guest_right'));
echo CHtml::openTag('div', array('class' => 'user_title'));
echo $kfname;
echo CHtml::closeTag('div');

echo CHtml::openTag('div', array('class' => 'user_middle'));
echo '姓名：' . $kfname;
echo CHtml::closeTag('div');

echo CHtml::openTag('div', array('class' => 'user_bottom'));
echo CHtml::closeTag('div');
echo CHtml::closeTag('div');?>
<div id="guest_tools">
	<div id="tools_reset"
	     class="tools_reset_off"
	     onmouseover="chClassname(this, 'reset');"
	     onclick="ResetInput();"
	     title="重置"></div>

</div>
<?php
echo CHtml::openTag('div', array('class' => 'ico_message'));
echo CHtml::image("$baseUrl/images/message.gif");

echo CHtml::closeTag('div');

echo CHtml::openTag('div', array('class' => 'message_div'));
echo CHtml::openTag('textarea', array('id' => 'message', 'class' => 'message'));
echo CHtml::closeTag('textarea');
echo CHtml::closeTag('div');

echo CHtml::openTag('div', array('class' => 'tools_send_div'));
echo CHtml::openTag('div', array(
                                'id' => 'tools_send',
                                'class' => 'tools_send',
                                'style' => 'padding:0',
                                'onclick' => 'sending()'
                           ));
echo "发送";
echo CHtml::closeTag('div');
echo CHtml::closeTag('div');

echo CHtml::openTag('div', array('id' => 'guest_bottom'));
echo CHtml::openTag('div', array('class' => 'sysinfo_div'));
echo CHtml::openTag('span', array('id' => 'status_ok', 'class' => 'status_ok'));
echo CHtml::image("$baseUrl/images/status_ok.gif");
echo CHtml::closeTag('span');

echo CHtml::openTag('span', array('id' => 'status_err', 'class' => 'status_err'));
echo CHtml::image("$baseUrl/images/status_err.gif");
echo CHtml::closeTag('span');

echo CHtml::openTag('span', array('id' => 'status_err2', 'class' => 'status_err'));
echo CHtml::image("$baseUrl/images/status_err.gif");
echo "&nbsp;&nbsp;数据库访问错误，请稍后重试！";
echo CHtml::closeTag('span');
echo CHtml::closeTag('div');

echo CHtml::openTag('div', array('style' => 'display:none'));
echo CHtml::image("$baseUrl/images/waitt.gif", '', array('align' => 'top'));
echo CHtml::closeTag('div');

echo CHtml::openTag('div', array('id' => 'copyright', 'class' => 'copyright'));
echo "&nbsp;2013&nbsp;";
echo CHtml::link('WeLive', '#');
echo '在线客服系统（v3.2.0）';
echo CHtml::closeTag('div');
echo CHtml::closeTag('div');
echo CHtml::closeTag('div');
?>
<input type="hidden" id="kfid" value="<?php echo $kfid?>"/>
<input type="hidden" id="kfname" value="<?php echo $kfname?>"/>
<input type="hidden" id="session_id" value="<?php echo $session_id?>">
</body>
<script type="text/javascript">
	var seconds = 0, minutes = 0, hours = 0;
	var tttt = 0, flashtitle_step = 0, response_tout = 0;
	ttttt = 0;
	var pagetitle = document.title;
	var sound = '<object data="<?php echo $baseUrl?>/sound.swf" type="application/x-shockwave-flash" width="1" height="1" style="visibility:hidden"><param name="movie" value="<?php echo $baseUrl?>/sound.swf" /><param name="menu" value="false" /><param name="quality" value="high" /></object>';
	_attachEvent(window, "load", timer_start, document);
	_attachEvent(window, "beforeunload", setOffline);
	_attachEvent(window, "unload", setOffline);
	_attachEvent(document, 'mousedown', stopFlashTitle);
	setOnline();
</script>