<div id="top-container">
  <div id="top-left"></div>
  <div id="top-main">
      <ul>
      
      	<li><a href="<?php echo $html->url("/admin/webmailler/mail_templates");?>"  target="mainFrame"><em class="article-icon"></em><?php __("Templates"); ?></a></li>
      	<li><a href="<?php echo $html->url("/admin/webmailler/mail_customers");?>"  target="mainFrame"><em class="users-icon"></em><?php __("Customers"); ?></a></li>
      	<li><a href="<?php echo $html->url("/admin/webmailler/mail_servers");?>"  target="mainFrame"><em class="system-icon"></em><?php __("Mail Server"); ?></a></li>
      	<li><?php echo $html->link('<em class="logout-icon"></em>' . __('Logout', true), "/users/logout", array('target'=>'_parent'), __('Are you sure want to logout?', true), false ); ?>	</li>
        
      </ul>
  </div>
  <div id="top-right"></div>
</div>
