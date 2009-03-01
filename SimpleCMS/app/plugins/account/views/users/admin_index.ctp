<?php
echo $modal->init('ex4');
?>

<div class="users index">
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('username');?></th>
	<th><?php echo $paginator->sort('gender');?></th>
	<th><?php echo $paginator->sort('realname');?></th>
	<th><?php echo $paginator->sort('birthday');?></th>
	<th><?php echo $paginator->sort('marriage');?></th>
	<th><?php echo $paginator->sort('addrees');?></th>
	<th><?php echo $paginator->sort('phone');?></th>
	<th><?php echo $paginator->sort('mobile');?></th>
	<th><?php echo $paginator->sort('email');?></th>
	<th><?php echo $paginator->sort('photo');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th><?php echo $paginator->sort('add_ip');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($users as $user):
?>
	<tr>
		<td>
			<?php echo $user['User']['id']; ?>
		</td>
		<td>
			<?php echo $user['User']['username']; ?>
		</td>
		<td>
			<?php echo $user['User']['gender']; ?>
		</td>
		<td>
			<?php echo $user['User']['realname']; ?>
		</td>
		<td>
			<?php echo $user['User']['birthday']; ?>
		</td>
		<td>
			<?php echo $user['User']['marriage']; ?>
		</td>
		<td>
			<?php echo $user['User']['addrees']; ?>
		</td>
		<td>
			<?php echo $user['User']['phone']; ?>
		</td>
		<td>
			<?php echo $user['User']['mobile']; ?>
		</td>
		<td>
			<?php echo $user['User']['email']; ?>
		</td>
		<td>
			<?php echo $user['User']['photo']; ?>
		</td>
		<td>
			<?php echo $user['User']['user_id']; ?>
		</td>
		<td>
			<?php echo $user['User']['add_ip']; ?>
		</td>
		<td>
			<?php echo $user['User']['created']; ?>
		</td>
		<td>
			<?php echo $user['User']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $user['User']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $user['User']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
