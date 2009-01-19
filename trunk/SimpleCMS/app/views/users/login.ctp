<?php
    
    echo $form->create('User', array('action' => 'login'));
//    echo $form->input('username');
//    echo $form->input('password');
//    echo $form->submit(__("Login", true), array('class'=>'login-btn') );
//    echo $form->button(__("Reset", true), array('class'=>'login-btn','type'=>'reset') );
?>
			<table width="100%" border="0">
			  <tr>
				<td ><?php if  ($session->check('Message.auth')) $session->flash('auth'); ?></td>
			  </tr>
			  <tr>
				<td><?php echo $form->input('username'); ?></td>
			  </tr>
			  <tr>
				<td><?php echo $form->input('password'); ?></td>
			  </tr>
			  <tr>
				<td align="center">
				<?php
			    echo $form->submit(__("Login", true), array('class'=>'login-btn') );
			    echo $form->button(__("Reset", true), array('class'=>'login-btn','type'=>'reset') );
				
				?>
				</td>
			  </tr>
		  </table>
<?php echo $form->end(); ?>