<?php if (!defined('APPPATH')) exit('no permission');
//修改文章的操作
require_once('base.php');
if ($isLogin == false) {	//没有登录，则跳到首页
	jump_url('/');
}

if (isset($_POST['submit'])) {
	//执行提交表单后的操作
	$aid = (int)$_POST['aid'];
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
	if($image['name'] != '') {
		//如果有上传图片，则修改，无则不修改
		$imageType = substr($image['name'], (strrpos('.', $image['name']) + 1));
		if (!in_array($imageType, $upload_type)) {
			show_alert('上传的文件类型不允许!', '');
		}
		$imageName = date('Y-m-dHis').'.'.$imageType;
		$imageUrl = $img_upload.$imageName;
		if ( ! move_uploaded_file($image['tmp_name'], $imageUrl)) {
			show_alert('图片上传失败，请重试!', '');
		}
	} else {
		$imageUrl = '';
	}
	
	//修改文章信息
	$title = mysql_escape_string($title);
	$content = mysql_escape_string($content);
	$sql = "UPDATE xs_article SET `title`='{$title}', `content`='{$content}', editdate='".time()."'";
	if ($imageUrl != '') {	//如果图片不等于空，则修改图片地址
		$sql .= ",image='{$imageUrl}' ";
	}
	$sql .= " WHERE aid='{$aid}'";
	if ($db->query($sql)) {
		//修改文章成功
		show_alert('修改文章成功!', '/read.php?aid='.$aid);
	} else {
		//修改文章失败
		show_alert('修改文章失败', '');
	}
}

//查找文章内容并显示
$aid = (int)$_GET['aid'];
$sql = "SELECT * FROM xw_article WHERE aid='{$aid}' LIMIT 1";
$query = $db->query($sql);
$articleInfo = $db->fetch_one($query);
if (empty($articleInfo)) {	//没有查询到指定的AID的文章内容
	show_alert('文章查找失败!');
}

//显示修改文件的模版文件
include (APPPATH.'/tpl/edit_article.tpl.php');