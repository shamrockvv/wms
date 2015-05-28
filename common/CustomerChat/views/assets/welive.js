function isUndefined(variable) {
	return typeof variable == 'undefined' ? true : false
}
function flashTitle() {
	clearInterval(tttt);
	flashtitle_step = 1;
	tttt = setInterval(function () {
		if (flashtitle_step == 1) {
			document.title = '【 新消息 】' + pagetitle;
			flashtitle_step = 2
		} else {
			document.title = '【　　　】' + pagetitle;
			flashtitle_step = 1
		}
	}, 200)
}
function stopFlashTitle() {
	if (flashtitle_step != 0) {
		flashtitle_step = 0;
		clearInterval(tttt);
		document.title = pagetitle
	}
}
function _attachEvent(obj, evt, func, eventobj) {
	eventobj = !eventobj ? obj : eventobj;
	if (obj.addEventListener) {
		obj.addEventListener(evt, func, false)
	} else if (eventobj.attachEvent) {
		obj.attachEvent('on' + evt, func)
	}
}
function timer_start() {
	if (seconds >= 59) {
		seconds = 0;
		minutes += 1
	} else {
		seconds += 1
	}
	if (minutes >= 60) {
		minutes = 0;
		hours += 1
	}
	displaytime();
	setTimeout('timer_start()', 1000)
}
function displaytime() {
	var sec_display, mins_display, hours_display;
	if (seconds < 10) {
		sec_display = "0" + seconds
	} else {
		sec_display = seconds
	}
	if (minutes < 10) {
		mins_display = "0" + minutes
	} else {
		mins_display = minutes
	}
	if (hours < 10) {
		if (hours > 0) {
			hours_display = "0" + hours + ":"
		} else {
			hours_display = ""
		}
	} else {
		hours_display = hours + ":"
	}
	$("#timer").html(hours_display + mins_display + ":" + sec_display);
}
function setFocus() {
	document.getElementById('message').focus()
}
function ctrlEnter(event) {
	stopFlashTitle();
	if (isUndefined(event))event = window.event;
	if (event.keyCode == 13 && event.ctrlKey) {
		sending()
	}
	return false
}
function ajax(url, act, line, kfid, kfname, session_id) {
	$.ajax({
		url:url,
		data:{"act":act,
			"line":line,
			"kfid":kfid,
			"kfname":kfname,
			"session_id":session_id

		},
		success:function welive_output(data) {
			var datas = JSON.parse(data);
			var do_flashTitle = false;

			if (datas.type == 1) {
				do_flashTitle = true;
				$('#sounder').html(sound);
			}
			document.getElementById("history").innerHTML = document.getElementById("history").innerHTML + datas.msg;
			if (do_flashTitle)flashTitle();
			document.getElementById("history").scrollTop = document.getElementById("history").scrollHeight;
			window.focus();
			setFocus();
			waiting();
		}
	});
}
function ajaxoff(url, act, session_id) {
	$.ajax({
		url:url,
		data:{"act":act,
			"session_id":session_id
		}
	});
}
//function autoOffline() {
//    clearTimeout(ttttt);
//    ttttt = setTimeout(function () {
//        setOffline();
//        kickout = 1;
//        var date = new Date();
//        var sender='系统消息';
//        var ending="长时间停止会话, 系统已自动离线! 点击 <a href='javascript:' onclick='setOnline();return false;'><span class='greenb'>重新上线</span>";
//        var msg="<span class='time'>"+date+"</span><span class='sender_sys'>"+sender+"</span><span>"+ending+'</span><br/>';
//        document.getElementById('history').innerHTML=document.getElementById('history').innerHTML+msg;
//    }, 1 * 60000);
//}
function setOffline() {
	var session_id = $("#session_id").val();
	ajaxoff('/ask/guest', "offline", session_id);
}
function setOnline() {
	kickout = 0;
	ajax('/ask/guest', "online", 0, 0, 0, 0);
	waiting();
	//autoOffline();
}
function waiting() {
	if (kickout == 1)return;
	lock = 0;
	clearTimeout(response_tout);
	response_tout = setTimeout('welive()', 5 * 1000)
}
function welive() {
	if (kickout == 1)return;
	if (lock == 0) {
		lock = 1;
		var kfid = $("#kfid").val();
		var kfname = $("#kfname").val();
		ajax('/ask/guest', 'waiting', 0, kfid, kfname, 0);
		waiting()
	}
}
function sending() {
	var msg = $("#message").val();
	var kfname = $("#kfname").val();
	var session_id = $("#session_id").val();
	msg.replace(/(^\s+)|\s+$/g, "").replace(/\^\^\^|\|\|\|/g, "");
	var kfid = $("#kfid").val();
	if (msg == '') {
		alert('请输入聊天信息');
		setFocus();
		return;
	}
	ajax('/ask/guest', 'sending', msg, kfid, kfname, session_id);
	//autoOffline()
	$("#message").val('');
	setFocus()
}
function chClassname(obj, newClassName) {
	var oldClassName = obj.className;
	obj.className = 'tools_' + newClassName + '_hover';
	obj.onmouseout = function () {
		this.className = oldClassName
	}
}
function ResetInput() {
	$("#message").val('');
	$("#message").focus()
}