<?php 
echo $modal->modalForm('ex4', "AddForm");
?>

<div class="financies form">
<?php echo $form->create('Financy', array('id'=>'AddForm' ) );?>
	<fieldset>
 		<legend><?php __('Add Financy');?></legend>
	<?php
		echo $form->input('finance_categories_id');
		echo $form->input('create_date');
		echo $form->input('amount');
		echo $form->input('debit');
		echo $form->input('money');
		echo $form->input('memo');
		echo $form->input('active');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
