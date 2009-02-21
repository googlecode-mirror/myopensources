<div class="financeCategories form">
<?php echo $form->create('FinanceCategory');?>
	<fieldset>
 		<legend><?php __('Edit FinanceCategory');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('category_name');
		echo $form->input('active');
		echo $form->input('add_ip');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('FinanceCategory.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('FinanceCategory.id'))); ?></li>
		<li><?php echo $html->link(__('List FinanceCategories', true), array('action'=>'index'));?></li>
	</ul>
</div>
