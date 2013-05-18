<?php
//添加文章的操作
require_once('base.php');
if ($isLogin == false) {	//没有登录，则跳到首页
	jump_url('/');
}

if (isset($_POST['submit'])) {
	//提交添加文章表单的操作
	$title = $_POST['title'];
	$content = $_POST['content'];
	$image = $_FILES['image'];
	//验证数据的正确性
	if ($title == '') {
		show_alert('标题不能为空!', '');
	}
	if ($content == '') {
		show_alert('内容不能为空', '');
	}
	
	//有图片上传，则进行图片上传操作，保存图片到指定目录
	if ($image['name'] != '') {
		//上传并保存图片
		$imageType = substr($image['name'], (strrpos($image['name'], '.') + 1));
		if (!in_array($imageType, $upload_type)) {
			show_alert('上传的文件类型不允许!', '');
		}
		$imageName = date('Y-m-dHis').'.'.$imageType;
		$imageUrl = $img_upload.$imageName;
		if ( ! move_uploaded_file($image['tmp_name'], APPPATH.trim($imageUrl, '/'))) {
			show_alert('图片上传失败，请重试!', '');
		}
	} else {
		$imageUrl = '';
	}
	//将文章记录保存到数据库
	$title = addslashes($title);
	$content = addslashes($content);
	$sql = "INSERT INTO xw_article (`title`, `content`, `image`, adddate, editdate) VALUES(
	'{$title}', '{$content}', '{$imageUrl}', ".time().", ".time().")";
	if ($db->query($sql)) {
		//添加成功
		$aid = $db->insert_id();
		show_alert('文章添加成功!', '/read.php?aid='.$aid);
	} else {
		//添加失败
		show_alert('文章添加失败，请重试', '');
	}
}

//显示添加文章的模版界面
include (APPPATH.'/tpl/add_article.tpl.php');