<div class="purchOrders form">
<?php echo $form->create('PurchOrder');?>
	<fieldset>
 		<legend><?php __('Add PurchOrder');?></legend>
	<?php
		echo $form->input('supplier_id');
		echo $form->input('ord_date');
		echo $form->input('del_add');
		echo $form->input('contact');
		echo $form->input('status');
		echo $form->input('memo');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List PurchOrders', true), array('action'=>'index'));?></li>
	</ul>
</div>
