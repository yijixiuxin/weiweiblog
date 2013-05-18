<?php
//加载基本文件
require_once ('base.php');

$aid = (int)$_GET['aid'];
if (empty($aid)) {
	jump_url('/');
}

//删除文章
$sql = "DELETE FROM xw_article WHERE aid='{$aid}'";
$result = $db->query($sql);
//删除文章的评论
$sql = "DELETE FROM xw_comment WHERE aid='{$aid}'";
$result = $db->query($sql);
if ($result == false) {
	show_alert('删除失败！');
}
show_alert('删除成功!', '/');