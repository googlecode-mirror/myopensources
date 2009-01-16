<div class="articleCategories view">
<h2><?php  __('ArticleCategory');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articleCategory['ArticleCategory']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('parent_id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articleCategory['ArticleCategory']['parent_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articleCategory['ArticleCategory']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articleCategory['ArticleCategory']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articleCategory['ArticleCategory']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit ArticleCategory', true), array('action'=>'edit', $articleCategory['ArticleCategory']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete ArticleCategory', true), array('action'=>'delete', $articleCategory['ArticleCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articleCategory['ArticleCategory']['id'])); ?> </li>
		<li><?php echo $html->link(__('List ArticleCategories', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New ArticleCategory', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
