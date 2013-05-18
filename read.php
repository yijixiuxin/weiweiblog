<?php
//阅读文章的操作
require_once('base.php');

$aid = (int)$_GET['aid'];
if (empty($aid)) {
	jump_url('/');
}

if (isset($_POST['submit'])) {
	//有提交表单的操作，添加该文章的评论信息
	$userName = $_POST['username'];
	$content = $_POST['content'];
	if (empty($userName)) show_alert('昵称不能为空!');
	if (empty($content)) show_alert('内容不能为空!');
	$sql = "INSERT INTO xw_comment (aid, username, comment, adddate) VALUES('{$aid}', '{$userName}', '{$content}', '".time()."')";
	if ($db->query($sql)) {
		show_alert('发表评论成功!', 'read.php?aid='.$aid);
	} else {
		show_alert('发表评论失败!');
	}
}

$sql = "SELECT * FROM xw_article WHERE aid='{$aid}' LIMIT 1";
$query = $db->query($sql);
$articleInfo = $db->fetch_one($query);
if (empty($articleInfo)) {	//没有查询到指定的AID的文章内容
	show_alert('文章查找失败!');
}
//更新此文章的点击量
$sql = "UPDATE xw_article SET clicks=clicks+1 WHERE aid='{$aid}'";
$db->query($sql);

//查找该文章的所有评论
$sql = "SELECT * FROM xw_comment WHERE aid='{$aid}'";
$query = $db->query($sql);
$commentInfo = $db->fetch_all($query);

//显示修改文件的模版文件
include (APPPATH.'/tpl/read.tpl.php');