<div class="financeCategories view">
<h2><?php  __('FinanceCategory');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeCategory['FinanceCategory']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Category Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeCategory['FinanceCategory']['category_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Active'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeCategory['FinanceCategory']['active']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Add Ip'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeCategory['FinanceCategory']['add_ip']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeCategory['FinanceCategory']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeCategory['FinanceCategory']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit FinanceCategory', true), array('action'=>'edit', $financeCategory['FinanceCategory']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete FinanceCategory', true), array('action'=>'delete', $financeCategory['FinanceCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $financeCategory['FinanceCategory']['id'])); ?> </li>
		<li><?php echo $html->link(__('List FinanceCategories', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New FinanceCategory', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
