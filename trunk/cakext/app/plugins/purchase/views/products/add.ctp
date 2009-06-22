<div class="products form">
<?php echo $form->create('Product');?>
	<fieldset>
 		<legend><?php __('Add Product');?></legend>
	<?php
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
		<li><?php echo $html->link(__('List Products', true), array('action'=>'index'));?></li>
	</ul>
</div>
