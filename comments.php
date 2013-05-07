<?php if (!defined('APPPATH')) exit('no permission');
//评论列表的显示

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = $page <= 0  ? 1 : $page;

//查找所有评论总数
$sql = "SELECT COUNT(pid) as count FROM xw_comment";
$query = $db->query($sql);
$count = $db->fetch_one($query);
$count = $count['count'];

//查询本页应该显示的信息
$start = ($page - 1) * $comment_page;
$sql = "SELECT m.*, a.`title` FROM xw_comment as m
	LEFT JOIN xw_article as a ON a.aid = m.aid LIMIT {$start}, {$comment_page}";
$query = $db->query($sql);
$commentInfo = $db->fetch_all();

//显示评论列表的模版文件
include (APPPATH.'/tpl/comments.tpl.php');