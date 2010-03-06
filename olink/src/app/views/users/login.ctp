<?php echo $this->element('top');?>
<div class="divMemCenter" >
<?php if  ($session->check('Message.auth')) $session->flash('auth'); ?>
			<span class = "spanLoginHead">用户登录</span>
<?php

    echo $form->create('User', array('action' => 'login', "name"=>"loginForm", "id"=>"loginForm" ));
?>
			<div class="divLoginModeSwitch"><div id="divLoginTabMenu1" onclick="loginModeSwitch(0)" class="divLoginModeSwitchOn">口令登录</div><div id="divLoginTabMenu2" onclick="loginModeSwitch(1)" class="divLoginModeSwitchOut">Key登录</div></div>
			<div id="divEmailLoginMode">
			<span class = "spanLoginTab">用户名：<input type="text" name="data[User][username]" id="email"  class="textStyle"  /></span>
			<span class = "spanLoginTab">  密码：<input type="password" name="data[User][password]" id="password"   class="textStyle"  /></span>
			<span class = "spanLoginTab"><input type="submit" value = "登 录" class = "buttonStyle"   /><br /><br /><!-- <a href="../account/fetchPWD1.jsp" >忘记密码?</a> --></span>
			</div>
			<div id="divKeyLoginMode" style="display:none">
			<div style="color:red;display:none" id="divIEAlert"><div id="divIEAlertText">您的电脑未安装控件!<br />安装后请按“F5”。</div><br /><a href="#" onclick="document.location.href='../download/GTSMM.exe'"><img src="images/downloadcontrolbutton.gif"  border="0" alt="" /></a></div>
			<div id="SecmailSafeLoginDiv"><input id="chapchallenge" name="chapchallenge" type="hidden" value="AQAAFBuA/N5siXuJ1QGpHFOcwBCbSAzd
" /></div>
			<div id="divKeyLoginSubmitButton" >
			<span><input type="submit" value="登 录" class="buttonStyle" /><br /><br /><!-- <a href="../account/fetchPWD1.jsp">忘记密码?</a> --></span>
			</div>
			<?php echo $form->end(); ?>

		</div>

