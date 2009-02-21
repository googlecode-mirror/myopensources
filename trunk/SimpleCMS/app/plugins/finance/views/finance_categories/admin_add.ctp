<?php 
echo $modal->modalForm('ex4', "AddForm");
?>

<div class="financeCategories form">
<?php echo $form->create('FinanceCategory', array('id'=>'AddForm' ) );?>
	<fieldset>
 		<legend><?php __('Add FinanceCategory');?></legend>
	<?php
		echo $form->input('category_name');
		echo $form->radio('active', $active_options, array('separator'=> '', 'value'=> 'new'));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
