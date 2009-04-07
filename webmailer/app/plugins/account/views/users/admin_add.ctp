<?php 
echo $modal->modalForm('ex4', "AddForm");
?>

<div class="users form">
<?php echo $form->create('User', array('id'=>'AddForm' ) );?>
	<fieldset>
 		<legend><?php __('Add User');?></legend>
	<?php
		echo $form->input('username');
		echo $form->input('password');
		echo $form->input('gender');
		echo $form->input('realname');
		echo $form->input('birthday');
		echo $form->input('marriage');
		echo $form->input('addrees');
		echo $form->input('phone');
		echo $form->input('mobile');
		echo $form->input('email');
		echo $form->input('photo');
		echo $form->input('memo');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
