<div class="administrator form">
<?php echo $form->create('Administrator');?>
	<fieldset>
 		<legend><?php __('Add Administrator');?></legend>
	<?php
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Administrator', true), array('action' => 'index'));?></li>
	</ul>
</div>
