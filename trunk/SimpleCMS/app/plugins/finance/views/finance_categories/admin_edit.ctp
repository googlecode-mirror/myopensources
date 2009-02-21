<div class="financeCategories form">
<?php echo $form->create('FinanceCategory');?>
	<fieldset>
 		<legend><?php __('Edit FinanceCategory');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('category_name');
		echo $form->radio('active', $active_options );
		?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
