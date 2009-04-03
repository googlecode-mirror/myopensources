<?php 
echo $modal->modalForm('ex4', "AddForm");
?>

<div class="mailCustomers form">
<?php echo $form->create('MailCustomer', array('id'=>'AddForm' ) );?>
	<fieldset>
 		<legend><?php __('Edit MailCustomer');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('nickname');
		echo $form->input('gender');
		echo $form->input('email');
		echo $form->input('tel');
		echo $form->input('memo');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('MailCustomer.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('MailCustomer.id'))); ?></li>
		<li><?php echo $html->link(__('List MailCustomers', true), array('action'=>'index'));?></li>
	</ul>
</div>
