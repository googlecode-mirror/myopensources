<div class="stockCategories view">
<h2><?php  __('StockCategory');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockCategory['StockCategory']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Code'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockCategory['StockCategory']['code']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockCategory['StockCategory']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockCategory['StockCategory']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockCategory['StockCategory']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit StockCategory', true), array('action'=>'edit', $stockCategory['StockCategory']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete StockCategory', true), array('action'=>'delete', $stockCategory['StockCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stockCategory['StockCategory']['id'])); ?> </li>
		<li><?php echo $html->link(__('List StockCategories', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New StockCategory', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
