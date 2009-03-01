<?php
echo $modal->init('ex4');
?>

<div class="departments index">
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<form id='list-form' action='<?php echo $html->url("/admin/account/departments/delSelected");?>' method='POST'>
<table cellpadding="0" cellspacing="0">
<tr>
	<th width="40px"><input id="select_all" type="checkbox" /></th>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($departments as $department):
?>
	<tr>
		<td>
			<input id="all[]" type="checkbox" value="<?php echo $department['Department']['id']; ?>" name="all[]"/>
		</td>
		<td>
			<?php echo $department['Department']['id']; ?>
		</td>
		<td>
			<?php echo $department['Department']['name']; ?>
		</td>
		<td>
			<?php echo $department['Department']['created']; ?>
		</td>
		<td>
			<?php echo $department['Department']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $department['Department']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $department['Department']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $department['Department']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</form>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
