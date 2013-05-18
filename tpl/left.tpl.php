<div class="left">
	<?php
    	if ($isLogin == true) {
			echo '<div><input value="撰写博文" onclick="javascript:location.href=\'/add_article.php\'" class="submit" /></div>';	
		}
	?>
	<div></div>
	<!-- 左侧区域 -->
    <div class="hot_article">
    	<h1>热门文章</h1>
        <ul>
        <?php
        	if (empty($leftHotArticle)) {
				echo '<li>无热门文章</li>';
			} else {
				foreach ($leftHotArticle as $a) {
					echo "<li><a href='read.php?aid={$a['aid']}'>{$a['title']}</a></li>";
				}
			}
		?>
        </ul>
    </div>
    <div class="new_comments">
    	<h1>最新评论</h1>
        <?php
        	if (empty($leftNewComments)) {
				echo '<div class="comments">无最新评论</div>';
			} else {
				foreach ($leftNewComments as $c) {
					echo "<div class='comments'><span class='username'>{$c['username']}：</span>{$c['comment']}</div>";
				}
			}
		?>
        </ul>
    </div>
</div>