<div id="top-container">
  <div id="top-left"></div>
  <div id="top-main">
      <ul>
      
      	<li><a href="#"><em class="article-icon"></em>文章</a></li>
      	<li><a href="#"><em class="users-icon"></em>用户</a></li>
      	<li><a href="#"><em class="system-icon"></em>系统</a></li>
      	<li><em class="logout-icon"></em><?php echo $html->link(__('Logout', true), "/users/logout", array('target'=>'_parent'), __('Are you sure want to logout?', true) ); ?>	</li>
        
      </ul>
  </div>
  <div id="top-right"></div>
</div>
