<?php 
echo $modal->modalForm('ex4', "AddForm");
?>

<div class="mailCustomerCategories form">
<?php echo $form->create('MailCustomerCategory', array('id'=>'AddForm' ) );?>
	<fieldset>
 		<legend><?php __('Add MailCustomerCategory');?></legend>
	<?php
		echo $form->input('name');
//		echo $form->input('active');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
