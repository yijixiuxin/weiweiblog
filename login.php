<?php
//加载基本文件
require_once ('base.php');

//网站登录退出等相关操作
$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == 'login') {
  //执行登录操作
  //获取表单提交的用户名与密码信息
  $userName = isset($_POST['username']) ? $_POST['username'] : '';
  $userPwd = isset($_POST['userpwd']) ? $_POST['userpwd'] : '';
  //判断用户名和密码是否为空
  if ($userName == '') {
    show_alert('用户名不能为空!', '/');
  }
  if ($userPwd == '') {
  	show_alert('密码不能为空!', '/');
  }
  //生成SQL语句，执行
  $sql = "SELECT * FROM xs_users WHERE uname='{$userName}' AND pwd='{$userPwd}'";
  $query = $db->query($sql);
  $userInfo = $db->fetch_ont($query);
  if (empty($userInfo)) {
    //没有查找到记录，说明用户名密码错误，提示
    show_alert('用户名或密码不正确!', '/');
  }
  //登录成功，记录已登录标示，然后跳转到首页
  $_SESSION['isLogin'] = true;
  jump_url('/');  
} else if ($action == 'logout') {
  //执行退出操作
  $_SESSION['isLogin'] = false;
  jump_url('/');
} else {
	//加载首页模版
	include APPPATH.'/tpl/login.tpl.php';
}