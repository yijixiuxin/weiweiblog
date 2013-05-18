<?php if (!defined('APPPATH')) exit('not permission');
//查看文章的模版文件
include APPPATH.'tpl/header.tpl.php';	//加载头部文件
?>

<div class="content">
	<div class="content-top"></div>
    	<div class="blog">
        	<!-- 博文内容区 -->
            <div class="article">
            	<h1 class="title"><?php echo $articleInfo['title']?></h1>
                <span class="date"><?php echo date('M.d.Y', $articleInfo['adddate']); ?></span>
                <div class="img">
                	<img src="<?php echo empty($articleInfo['image']) ? '/static/images/default_img.jpg' : $articleInfo['image'];?>" width="480" height="120" />
                </div>
                <div class="neirong">
                	<?php
                    	echo str_replace('_baidu_page_break_tag_', '', $articleInfo['content']);
					?>
                </div>
                <?php if ($isLogin == true) { ?>
                <div class="quanwen"><a href="edit_article.php?aid=<?php echo $articleInfo['aid'];?>">编辑</a></div>
                <?php } ?>
                <div class="fenge"></div>
            </div>
           <!-- 评论列表 -->
           <div class="comments">
           		<h3>评论</h3>
           		<?php 
           			if(empty($commentInfo)) {
           				echo '没有评论信息';
           			} else {
           				foreach ($commentInfo as $c) {
           		?>
           		<div class="comment_list">
           			<div class="date"><?php echo date('Y-m-d H:i A', $c['adddate']);?></div>
           			<div><span class="comment_username"><?php echo $c['username'];?>：</span><?php echo $c['comment'];?></div>
           		</div>
           		<?php 
           				}
           			}
           		?>
           		
           </div>
           <div class="fabiao">
           	<h3>发表评论</h3>
           	<form action="" method="post">
           		<p><input type="text" class="text" name="username" />&nbsp;&nbsp;<span class="nickname">*昵称</span></p>
           		<p>
           			<textarea rows="" cols="" class="text" style="width:300px;height:50px;" name="content"></textarea>
           			&nbsp;&nbsp;
           			<input type="submit" name="submit" value="发表" class="submit" style="height:50px;font-size:18px;" />
           		</p>
           	</form>
           	<p></p>
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