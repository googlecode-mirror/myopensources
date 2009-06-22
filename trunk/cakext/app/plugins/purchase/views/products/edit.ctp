<div class="products form">
<?php echo $form->create('Product');?>
	<fieldset>
 		<legend><?php __('Edit Product');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('code');
		echo $form->input('categoryid');
		echo $form->input('description');
		echo $form->input('units');
		echo $form->input('barcode');
		echo $form->input('kgs');
		echo $form->input('photo');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Product.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Product.id'))); ?></li>
		<li><?php echo $html->link(__('List Products', true), array('action'=>'index'));?></li>
	</ul>
</div>
