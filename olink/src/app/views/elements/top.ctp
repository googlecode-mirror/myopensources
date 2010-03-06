<div class = "idHeadBg" >
	<div class = "divHeadLogo"><div><img src="<?php echo $html->url("/images/logo.gif"); ?>"  border="0" alt="logo" /></div><div class="divHeadText"><br />
	<?php if(isset($authuser)):?>
	<?php echo $authuser['User']['username'] ?>，您好，欢迎登录接入管理系统！【&nbsp;<?php echo $html->link('退出系统', "/users/logout", array('target'=>'_parent'), __('Are you sure want to logout?', true), false ); ?>&nbsp;】
	<?php endif;?>
	</div></div>
</div>