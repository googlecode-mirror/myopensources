<div class="articleCategories form">
<?php echo $form->create('ArticleCategory');?>
	<fieldset>
 		<legend><?php __('Edit ArticleCategory');?></legend>
	<?php
		echo $form->input('id');
		echo $form->select('parent_id', $categories);
		echo $form->input('name', array('size'=>30) );
	?>
	</fieldset>
	<?php echo $form->end(__("Submit", true));?>
</div>
