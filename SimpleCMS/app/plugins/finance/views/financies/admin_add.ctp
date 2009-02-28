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
		echo $form->input('money');
		echo $form->radio('debit', $debit_options, array('separator'=> '', 'value'=> 'P'));
		echo $form->input('memo');
		echo $form->input('amount', array('value'=> '1') );
		echo $form->radio('active', $active_options, array('separator'=> '', 'value'=> 'new'));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
