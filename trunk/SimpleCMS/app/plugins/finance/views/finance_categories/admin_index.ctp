<?php

echo $modal->init('ex4');

?>
<div class="financeCategories index">
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<form id='list-form' action='<?php echo $html->url("/admin/finance/finance_categories/delSelected");?>' method='POST'>
<table cellpadding="0" cellspacing="0">
<tr>
	<th width="40px"><input id="select_all" type="checkbox" /></th>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('category_name');?></th>
	<th><?php echo $paginator->sort('active');?></th>
	<th><?php echo $paginator->sort('add_ip');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($financeCategories as $financeCategory):
?>
	<tr>
		<td>
			<input id="all[]" type="checkbox" value="<?php echo $financeCategory['FinanceCategory']['id']; ?>" name="all[]"/>
		</td>
		<td>
			<?php echo $financeCategory['FinanceCategory']['id']; ?>
		</td>
		<td>
			<?php echo $financeCategory['FinanceCategory']['category_name']; ?>
		</td>
		<td>
			<?php echo $active_options[ $financeCategory['FinanceCategory']['active'] ]; ?>
		</td>
		<td>
			<?php echo $financeCategory['FinanceCategory']['add_ip']; ?>
		</td>
		<td>
			<?php echo $time->format('Y-m-d H:i', $financeCategory['FinanceCategory']['created']); ?>
		</td>
		<td>
			<?php echo $time->format('Y-m-d H:i', $financeCategory['FinanceCategory']['modified']); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $financeCategory['FinanceCategory']['id']) , array('class'=>'ex4Trigger', 'title' => __('Edit', true) . " :: ". $financeCategory['FinanceCategory']['category_name'] )  ); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $financeCategory['FinanceCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $financeCategory['FinanceCategory']['id'])); ?>
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
