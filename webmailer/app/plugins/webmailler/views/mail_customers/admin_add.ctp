<?php 
echo $modal->modalForm('ex4', "AddForm");
?>

<div class="mailCustomers form">
<?php echo $form->create('MailCustomer', array('id'=>'AddForm' ) );?>
	<fieldset>
 		<legend><?php __('Add MailCustomer');?></legend>
	<?php
		echo $form->input('mail_customer_category_id');
		echo $form->input('nickname');
		echo $form->radio('gender', $gender_options, array('value'=>'M') );
		echo $form->input('email');
		echo $form->input('tel');
		echo $form->input('memo');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>

