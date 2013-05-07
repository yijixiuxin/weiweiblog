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

//获取热门文章列表
function hot_article($limit = 8) {
	global $db;
	$sql = "SELECT * FROM xw_article ORDER BY clicks DESC LIMIT 0, {$limit}";
	$query = $db->query($sql);
	return $db->fetch_all($query);
}

//获取最新评论列表
function new_comments($limit = 8) {
	global $db;
	$sql = "SELECT m.*, a.`title` FROM xw_comment as m
		LEFT JOIN xw_article as a ON m.aid = a.aid  
		ORDER BY m.adddate DESC LIMIT 0, {$limit}";
	$query = $db->query($sql);
	return $db->fetch_all($query);
}