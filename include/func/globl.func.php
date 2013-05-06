<?php if (!defined('APPPATH')) exit('not premission');
//此文件保存网站全局公共方法

//跳转到指定页面的方法
function jump_url($url = '/') {
  header('Location='.$url);
  exit();
}

//在页面弹出提示的方法
function show_alert($msg = '', $url = '/') {
	echo '
	<script type="text/javascript>
		alert("'.$msg.'");';
	if ($url == '') {
		echo 'history.go(-1);';
	} else {
		echo 'location.href = "'.$url.'";';	
	}
	echo '</script>';
	exit();
}
