<div class="mailTemplates form">
<?php echo $form->create('MailTemplate');?>
	<fieldset>
 		<legend><?php __('Edit MailTemplate');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('title');
		echo $form->input('subject');
		echo $form->input('content');
		echo $form->input('plain_text');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('MailTemplate.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('MailTemplate.id'))); ?></li>
		<li><?php echo $html->link(__('List MailTemplates', true), array('action'=>'index'));?></li>
	</ul>
</div>
