<div class="mailCustomers view">
<h2><?php  __('MailCustomer');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailCustomer['MailCustomer']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nickname'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailCustomer['MailCustomer']['nickname']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Gender'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailCustomer['MailCustomer']['gender']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailCustomer['MailCustomer']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tel'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailCustomer['MailCustomer']['tel']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Memo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailCustomer['MailCustomer']['memo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailCustomer['MailCustomer']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit MailCustomer', true), array('action'=>'edit', $mailCustomer['MailCustomer']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete MailCustomer', true), array('action'=>'delete', $mailCustomer['MailCustomer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mailCustomer['MailCustomer']['id'])); ?> </li>
		<li><?php echo $html->link(__('List MailCustomers', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New MailCustomer', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
