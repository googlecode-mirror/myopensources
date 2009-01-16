<div class="articleCategories form">
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
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List ArticleCategories', true), array('action'=>'index'));?></li>
	</ul>
</div>
