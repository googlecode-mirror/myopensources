<?php 
echo $modal->modalForm('ex4', "AddForm");
?>

<div class="financeCategories form">
<?php echo $form->create('FinanceCategory', array('id'=>'AddForm' ) );?>
	<fieldset>
 		<legend><?php __('Edit FinanceCategory');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('category_name');
		echo $form->radio('active', $active_options );
		?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
