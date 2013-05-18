<?php if (!defined('APPPATH')) exit('not permission');
//添加文章的模版文件
include APPPATH.'tpl/header.tpl.php';	//加载头部文件
?>
<script type="text/javascript">
    var editor = new UE.ui.Editor();
    editor.render("content");0
    //1.2.4以后可以使用一下代码实例化编辑器
    //UE.getEditor('myEditor')
</script>
<div class="content">
	<div class="content-top"></div>
    	<div class="blog" style="margin-top:20px;">
        	<!-- 博文内容区 -->
            <div class="title">撰写博文</div>
            <div style="clear:both;"></div>
            <div>
            <form action="add_article.php" method="post" enctype="multipart/form-data">
            	<p><span>标题：</span><input type="text" class="text" value="" name="title" /></p>
                <p><span>配图：</span><input type="file" name="image" id="image" /></p>
                <p><span>内容：</span><textarea name="content" id="content"></textarea></p>
                <p><input type="submit" name="submit" value="添加" class="submit" /></p>
            </form>
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