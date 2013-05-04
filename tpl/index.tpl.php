<?php if (!defined('APPPATH')) exit('not permission');
//首页模版文件
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  	<title>小韦博客</title>
    <script type="text/javascript" src="/ueditor/editor_config.js"></script>
	<script type="text/javascript" src="/ueditor/editor_all.js"></script>
  </head>
  <body>
    小韦博客
    
    <textarea name="key" id="myEditor"></textarea>
	<script type="text/javascript">
    	UE.getEditor('myEditor')
	</script>
  </body>
</html>