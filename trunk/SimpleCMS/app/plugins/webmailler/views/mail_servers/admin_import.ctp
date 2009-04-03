<?php 
echo $modal->modalForm('ex4', "AddForm");
?>

<div class="mailServers form">
<?php echo $form->create('MailServer', array('action'=>'import_data', 'id'=>'AddForm' ) );?>
	<fieldset>
 		<legend><?php __('Import MailServer');?></legend>
	<?php
		echo $form->input('file', array('type'=>'file'));

	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>