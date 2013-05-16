<?php if (!defined('APPPATH')) exit('not permission');
//首页模版文件
include APPPATH.'tpl/header.tpl.php';	//加载头部文件
?>

<div class="content">
	<div class="content-top"></div>
    	<div class="blog">
        	<!-- 博文内容区 -->
            <div class="login">
            	<h1 class="title">登录网站</h1>
                <div class="neirong">
                	<form action="login.php?action=login" method="post">
                	  <p>账号：<input type="text" name="username" class="text" /></p>
                      <p>密码：<input type="password" name="userpwd" class="text" /></p>
                      <p><input type="submit" name="submit" class="submit" value="登录" /></p>
                    </form>
                </div>
            </div>
        </div>
        
<?php
include APPPATH.'tpl/left.tpl.php';	//加载左侧
?>     
<div style="clear:both">
&nbsp;
</div>
</div>

<?php.
include APPPATH.'tpl/footer.tpl.php';	//加载底部文件
?>