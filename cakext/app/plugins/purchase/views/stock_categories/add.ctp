<div class="stockCategories form">
<?php echo $form->create('StockCategory');?>
	<fieldset>
 		<legend><?php __('Add StockCategory');?></legend>
	<?php
		echo $form->input('code');
		echo $form->input('description');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List StockCategories', true), array('action'=>'index'));?></li>
	</ul>
</div>
