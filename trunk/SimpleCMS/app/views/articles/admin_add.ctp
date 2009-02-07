<div class="articles form">
<?php echo $form->create('Article', array('enctype' => 'multipart/form-data') );?>
	<fieldset>
 		<legend><?php __('Add Article');?></legend>
	<?php
		echo $form->input('article_categories_id');
		echo $form->input('title');
		echo $form->input('contents');
		echo $form->file('photo');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Articles', true), array('action'=>'index'));?></li>
	</ul>
</div>
