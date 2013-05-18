<?php if (!defined('APPPATH')) exit('not permission');
//修改文章的模版文件
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
            <div class="title">编辑博文</div>
            <div style="clear:both;"></div>
            <div>
            <form action="edit_article.php" method="post" enctype="multipart/form-data">
            	<input type="hidden" name="aid" value="<?php echo $articleInfo['aid'];?>" />
            	<p><span>标题：</span><input type="text" class="text" value="<?php echo $articleInfo['title'];?>" name="title" /></p>
                <p><span>配图：</span><input type="file" name="image" /><span style="font-size:12px;color:#999">（不修改则无需上传）</span></p>
                <p><span>内容：</span><textarea name="content" id="content"><?php echo $articleInfo['content'];?></textarea></p>
                <p><input type="submit" name="submit" value="修改" class="submit" /></p>
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