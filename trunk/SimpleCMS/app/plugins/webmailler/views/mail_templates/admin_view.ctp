<div class="mailTemplates view">
<h2><?php  __('MailTemplate');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailTemplate['MailTemplate']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailTemplate['MailTemplate']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Subject'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailTemplate['MailTemplate']['subject']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Content'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailTemplate['MailTemplate']['content']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Plain Text'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailTemplate['MailTemplate']['plain_text']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailTemplate['MailTemplate']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit MailTemplate', true), array('action'=>'edit', $mailTemplate['MailTemplate']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete MailTemplate', true), array('action'=>'delete', $mailTemplate['MailTemplate']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mailTemplate['MailTemplate']['id'])); ?> </li>
		<li><?php echo $html->link(__('List MailTemplates', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New MailTemplate', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
