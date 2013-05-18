<?php if (!defined('APPPATH')) exit('not permission');
//最新评论的模版文件
include APPPATH.'tpl/header.tpl.php';	//加载头部文件
?>

<div class="content">
	<div class="content-top"></div>
    	<div class="blog">
           <!-- 评论列表 -->
           <div class="comments">
           		<h2>最新评论</h2>
           		<?php 
           			if(empty($commentInfo)) {
           				echo '没有评论信息';
           			} else {
           				foreach ($commentInfo as $c) {
           		?>
           		<div class="comment_list">
           			<div class="date"><?php echo date('Y-m-d H:i A', $c['adddate']);?></div>
           			<div><span class="comment_username"><?php echo $c['username'];?>：</span><?php echo $c['comment'];?></div>
           			<div class="com_article">评论来自：<span><a href="read.php?aid=<?php echo $c['aid'];?>">《<?php echo $c['title']?>》</a></span></div>
           		</div>
           		<?php 
           				}
           			}
           		?>
           		
           </div>
			
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
						for ($i = $begin; $i <= $end; $i++) {
							if ($i == $page) {
								echo '<span class="cur">'.$page.'</span>';
							} else {
								if ($i == $end) {
									echo '<span style="border:none;"><a href="comments.php?page='.$i.'">'.$i.'</a></span>';
								} else {
									echo '<span><a href="comments.php?page='.$i.'">'.$i.'</a></span>';
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