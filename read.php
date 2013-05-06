<?php if (!defined('APPPATH')) exit('no permission');
//阅读文章的操作
require_once('base.php');

$aid = (int)$_GET['aid'];
if (empty($aid)) {
	jump_url('/');
}

$sql = "SELECT * FROM xw_article WHERE aid='{$aid}' LIMIT 1";
$query = $db->query($sql);
$articleInfo = $db->fetch_one($query);
if (empty($articleInfo)) {	//没有查询到指定的AID的文章内容
	show_alert('文章查找失败!');
}
//查找该文章的所有评论
$mpage = (int)$_GET['mpage'];
$mpage = $mpage == 0 ? 1 : $mpage;
$lpage = ($mpage - 1) * 10;
$sql = "SELECT * FROM xw_comment WHERE aid='{$aid}' LIMIT {$lpage}, 10";
$query = $db->query($sql);
$commentInfo = $db->fetch_all($query);

//显示修改文件的模版文件
include (APPPATH.'/tpl/read_article.tpl.php');