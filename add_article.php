<?php if (!defined('APPPATH')) exit('no permission');
//添加文章的操作
require_once('base.php');
if ($isLogin == false) {	//没有登录，则跳到首页
	jump_url('/');
}

include (APPPATH.'/tpl/add_article.tpl.php');