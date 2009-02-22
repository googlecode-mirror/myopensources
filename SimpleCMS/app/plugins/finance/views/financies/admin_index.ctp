<div class="financies index">
<h2><?php __('Financies');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('finance_category_id');?></th>
	<th><?php echo $paginator->sort('create_date');?></th>
	<th><?php echo $paginator->sort('amount');?></th>
	<th><?php echo $paginator->sort('debit');?></th>
	<th><?php echo $paginator->sort('money');?></th>
	<th><?php echo $paginator->sort('memo');?></th>
	<th><?php echo $paginator->sort('active');?></th>
	<th><?php echo $paginator->sort('access');?></th>
	<th><?php echo $paginator->sort('groupid');?></th>
	<th><?php echo $paginator->sort('userid');?></th>
	<th><?php echo $paginator->sort('add_ip');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($financies as $financy):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $financy['Financy']['id']; ?>
		</td>
		<td>
			<?php echo $financy['Financy']['finance_category_id']; ?>
		</td>
		<td>
			<?php echo $financy['Financy']['create_date']; ?>
		</td>
		<td>
			<?php echo $financy['Financy']['amount']; ?>
		</td>
		<td>
			<?php echo $financy['Financy']['debit']; ?>
		</td>
		<td>
			<?php echo $financy['Financy']['money']; ?>
		</td>
		<td>
			<?php echo $financy['Financy']['memo']; ?>
		</td>
		<td>
			<?php echo $financy['Financy']['active']; ?>
		</td>
		<td>
			<?php echo $financy['Financy']['access']; ?>
		</td>
		<td>
			<?php echo $financy['Financy']['groupid']; ?>
		</td>
		<td>
			<?php echo $financy['Financy']['userid']; ?>
		</td>
		<td>
			<?php echo $financy['Financy']['add_ip']; ?>
		</td>
		<td>
			<?php echo $financy['Financy']['created']; ?>
		</td>
		<td>
			<?php echo $financy['Financy']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $financy['Financy']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $financy['Financy']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $financy['Financy']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $financy['Financy']['id'])); ?>
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
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Financy', true), array('action'=>'add')); ?></li>
	</ul>
</div>
