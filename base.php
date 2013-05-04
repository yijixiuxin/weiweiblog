<?php
//定义网站目录
define('APPPATH', dirname(__FILE__).'/');
//加载网站配置文件
require_once(APPPATH.'include/config.php');
//加载数据库配置文件
require_once(APPPATH.'include/database.php');
//开启SESSION功能
session_start();

//加载数据库链接类
require_once(APPPATH.'include/class/db.class.php');
//加载全局方法文件
require_once(APPPATH.'include/func/globl.func.php');

//实例化数据库类并连接
$db = new db($db_hostname, $db_username, $db_password, $db_database, $db_port);

//检查是否登录，记录登陆状态
$isLogin = isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true ? true : false;
