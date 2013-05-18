<?php if (!defined('APPPATH')) exit('not permission');
//首页模版文件
include APPPATH.'tpl/header.tpl.php';	//加载头部文件
?>

<div class="content">
	<div class="content-top"></div>
    	<div class="blog">
        	<!-- 博文内容区 -->
            <?php
				if (empty($allArticle)) {
					echo '<h1>没有更新任何文章</h1>';
				} else {
					foreach ($allArticle as $a) {
			?>
            <div class="article">
            	<h1 class="title"><a href="read.php?aid=<?php echo $a['aid']?>"><?php echo $a['title'];?></a></h1>
                <span class="date"><?php echo date('M.d.Y', $a['adddate']);?></span>
                <div class="img">
                	<img src="<?php echo empty($a['image']) ? '/static/images/default_img.jpg' : $a['image'];?>" width="480" height="120" />
                </div>
                <div class="neirong">
                	<?php
						//截取只显示分页前的内容
						$content = substr($a['content'], 0, strpos($a['content'], '_baidu_page_break_tag_'));
						echo $content;
					?>
                </div>
                <div class="quanwen">
                <?php 
				if ($isLogin == true) {
					echo "<a href='edit_article.php?aid={$a['aid']}'>编辑</a>&nbsp;&nbsp;";
					echo "<a href=\"javascript:if(confirm('确认要删除此文章？')){location.href='del_article.php?aid={$a['aid']}'}\">删除</a>&nbsp;&nbsp;";
				}
				?>
                <a href="read.php?aid=<?php echo $a['aid']?>">阅读全文•</a></div>
                <div class="fenge"></div>
            </div>
            <?php
					}}
			?>
            
            <!-- 分页 -->
            <?php
            	if ($count > 1) {
			?>
            <div class="page">
            	<?php if ($page > 1) {?>
            	<div class="pre"><a href="index.php?page=<?php echo $page-1;?>">上一页&lt;&lt;</a></div>
                <?php }
				
					$per = 5;
					if ($count > $per) {
						$begin = ($page - $per) <= 0 ? 1 : $page - $per;
						$end = ($page + $per) > $count ? $count : $page + $per;
					} else {
						$begin = 1;
						$end = $count;
					}
				?>
                
                <div class="page_num">
                	<?php
						for ($i = $begin; $i >= $end; $i++) {
							if ($i == $page) {
								echo '<span class="cur">'.$page.'</span>';
							} else {
								if ($i == $end) {
									echo '<span style="border:none;"><a href="index.php?page='.$i.'">'.$i.'</a></span>';
								} else {
									echo '<span><a href="index.php?page='.$i.'">'.$i.'</a></span>';
								}
								
							}
						}
					?>
                </div>
                <?php if ($page < $count) {?>
                <div class="next"><a href="index.php?page=<?php echo $page+1;?>">&gt;&gt;下一页</a></div>
                <?php }?>
                <div style="clear:both"></div>
             </div>
             <?php
				}
			 ?>
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