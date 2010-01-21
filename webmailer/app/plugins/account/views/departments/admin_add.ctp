<?php 
echo $modal->modalForm('ex4', "AddForm");
?>

<div class="departments form">
<?php echo $form->create('Department', array('id'=>'AddForm' ) );?>
	<fieldset>
 		<legend><?php __('Add Department');?></legend>
	<?php
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
