<?php 
echo $modal->modalForm('ex4', "AddForm");
?>

<div class="financies form">
<?php echo $form->create('Financy', array('id'=>'AddForm' ) );?>
	<fieldset>
 		<legend><?php __('Edit Financy');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('finance_categories_id');
		echo $form->input('create_date');
		echo $form->input('money');
		echo $form->input('memo');
		echo $form->radio('debit', $debit_options);
		echo $form->input('amount');
		echo $form->radio('active', $active_options);
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
