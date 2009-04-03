<div class="mailTemplates form">
<?php echo $form->create('MailTemplate');?>
	<fieldset>
 		<legend><?php __('Add MailTemplate');?></legend>
	<?php
		echo $form->input('title');
		echo $form->input('subject');
		echo $form->input('content');
		echo $form->checkbox('plain_text', array('label'=>"test"));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List MailTemplates', true), array('action'=>'index'));?></li>
	</ul>
</div>
