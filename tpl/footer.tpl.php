	<div class="footer">
    	<div class="footer_zs"></div>
        <div class="footer_content">
        	<div class="f_about">
            	<h1>关于本站</h1>
                <p>
                韦伟博客第一收藏博客网站，隶属于搜藏（北京）文化发展有限公司，是全国最具影响力的专业收藏投资博客之一，致力于为客户提供最具增值潜力的投资藏品和最优质完善的服务体系，永远将客户的利益放在首位，以专业、诚信、专注、高效的态度服务广大客户。
                </p>
            </div>
            <div class="f_site">
            	<h1>站点页面</h1>
                <ul>
                	<li><a href="">首页</a></li>
                    <li><a href="">热门文章</a></li>
                    <li><a href="">最新评论</a></li>
                    <li><a href="">关于本站</a></li>
                    <?php
						if ($isLogin) {
							echo '<li><a href="/login.php?action=logout">登出</a></li>';
						} else {
							echo '<li><a href="/login.php">登录</a></li>';
						}
					?>
                    
                </ul>
            </div>
            <div class="f_links">
            	<h1>友情链接</h1>
                <ul>
                	<li><a href="">搜藏天下</a></li>
                    <li><a href="">新浪博客</a></li>
                    <li><a href="">艺术中国</a></li>
                    <li><a href="">第一字画网</a></li>
                </ul>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
    
    </body>
</html>