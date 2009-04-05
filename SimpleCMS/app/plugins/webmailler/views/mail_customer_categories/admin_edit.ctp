<?php 
echo $modal->modalForm('ex4', "AddForm");
?>

<div class="mailCustomerCategories form">
<?php echo $form->create('MailCustomerCategory', array('id'=>'AddForm' ) );?>
	<fieldset>
 		<legend><?php __('Edit MailCustomerCategory');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
