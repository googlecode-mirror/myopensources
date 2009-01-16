<div class="articleCategories form">
<?php echo $form->create('ArticleCategory');?>
	<fieldset>
 		<legend><?php __('Add ArticleCategory');?></legend>
	<?php
		echo $form->input('pid');
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List ArticleCategories', true), array('action'=>'index'));?></li>
	</ul>
</div>
