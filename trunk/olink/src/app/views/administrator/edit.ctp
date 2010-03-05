<div class="administrator form">
<?php echo $form->create('Administrator');?>
	<fieldset>
 		<legend><?php __('Edit Administrator');?></legend>
	<?php
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Administrator.')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Administrator.'))); ?></li>
		<li><?php echo $html->link(__('List Administrator', true), array('action' => 'index'));?></li>
	</ul>
</div>
