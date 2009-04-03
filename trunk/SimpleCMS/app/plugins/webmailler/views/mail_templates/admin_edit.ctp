<?php 
echo $modal->modalForm('ex4', "AddForm");
?>

<div class="mailTemplates form">
<?php echo $form->create('MailTemplate', array('id'=>'AddForm' ) );?>
	<fieldset>
 		<legend><?php __('Edit MailTemplate');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('title');
		echo $form->input('subject');
		echo $form->input('content');
		echo $form->input('plain_text', array('type'=>'checkbox'));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
