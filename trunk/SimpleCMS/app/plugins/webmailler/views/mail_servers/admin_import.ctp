<?php 
echo $modal->modalForm('ex4', "AddForm");
?>

<div class="mailServers form">
<?php echo $form->create($current_model, array('url' => array('controller' => $current_controller, 'action'=>'import_data'), 'id'=>'AddForm' ) );?>
	<fieldset>
 		<legend><?php echo $msg;?></legend>
	<?php
		echo $form->input('file', array('type'=>'file'));

	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>