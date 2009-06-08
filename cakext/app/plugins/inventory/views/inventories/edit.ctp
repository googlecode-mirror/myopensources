<div class="inventories form">
<?php echo $form->create('Inventory');?>
	<fieldset>
 		<legend><?php __('Edit Inventory');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('address');
		echo $form->input('phone');
		echo $form->input('guard');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Inventory.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Inventory.id'))); ?></li>
		<li><?php echo $html->link(__('List Inventories', true), array('action'=>'index'));?></li>
	</ul>
</div>
