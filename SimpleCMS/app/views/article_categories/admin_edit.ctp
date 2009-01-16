<div class="articleCategories form">
<?php echo $form->create('ArticleCategory');?>
	<fieldset>
 		<legend><?php __('Edit ArticleCategory');?></legend>
	<?php
		echo $form->input('id');
		echo $form->select('parent_id', $categories);
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('ArticleCategory.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('ArticleCategory.id'))); ?></li>
		<li><?php echo $html->link(__('List ArticleCategories', true), array('action'=>'index'));?></li>
	</ul>
</div>
