<?php
//加载基本文件
require_once ('base.php');

//设置分页相关
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = $page <= 0 ? 1 : $page;
$curPage = 10 * ($page -1);
$sql = "SELECT COUNT(aid) as count FROM xw_article";
$query = $db->query($sql);
$count = $db->fetch_one($query);
$count = $count['count'];
$count = ceil($count / 10);

//获取本页应该显示的文章
$sql = "SELECT * FROM xw_article ORDER BY aid DESC LIMIT {$curPage}, 10";
$query = $db->query($sql);
$allArticle = $db->fetch_all($query);


//加载首页模版
include APPPATH.'/tpl/index.tpl.php';