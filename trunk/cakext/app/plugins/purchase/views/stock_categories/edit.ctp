<div class="stockCategories form">
<?php echo $form->create('StockCategory');?>
	<fieldset>
 		<legend><?php __('Edit StockCategory');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('code');
		echo $form->input('description');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('StockCategory.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('StockCategory.id'))); ?></li>
		<li><?php echo $html->link(__('List StockCategories', true), array('action'=>'index'));?></li>
	</ul>
</div>
