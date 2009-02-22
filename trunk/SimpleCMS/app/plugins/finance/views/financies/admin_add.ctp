<div class="financies form">
<?php echo $form->create('Financy');?>
	<fieldset>
 		<legend><?php __('Add Financy');?></legend>
	<?php
		echo $form->input('finance_category_id');
		echo $form->input('create_date');
		echo $form->input('amount');
		echo $form->input('debit');
		echo $form->input('money');
		echo $form->input('memo');
		echo $form->input('active');
		echo $form->input('access');
		echo $form->input('groupid');
		echo $form->input('userid');
		echo $form->input('add_ip');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Financies', true), array('action'=>'index'));?></li>
	</ul>
</div>
