<div class="articleCategories form">
<?php echo $test_data?>
<?php echo $form->create('ArticleCategory');?>
	<fieldset>
 		<legend><?php __('Add ArticleCategory');?></legend>
	<?php
		echo $form->select('parent_id', $categories);
		echo $form->error(
		    'ArticleCategory.parent_id',
		    __("Please select category", true)
		);

		echo $form->input('name', array('error'=>array(
							'notEmpty'=>__("Not allow blank", true),
							'maxlength'=>__("Fill up too long", true),
						)));
	?>
	</fieldset>
<?php echo $form->end( __("Submit", true) );?>
</div>
