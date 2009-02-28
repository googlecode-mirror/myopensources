<?php
echo $modal->init('ex4');
?>

<div class="financies index">
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<form id='list-form' action='<?php echo $html->url("/admin/finance/financies/delSelected");?>' method='POST'>
<table cellpadding="0" cellspacing="0">
<tr>
	<th width="40px"><input id="select_all" type="checkbox" /></th>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('finance_categories_id');?></th>
	<th><?php echo $paginator->sort('create_date');?></th>
	<th><?php echo $paginator->sort('amount');?></th>
	<th><?php echo $paginator->sort('debit');?></th>
	<th><?php echo $paginator->sort('money');?></th>
	<th><?php echo $paginator->sort('active');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th><?php echo $paginator->sort('add_ip');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
foreach ($financies as $financy):
?>
	<tr>
		<td>
			<input id="all[]" type="checkbox" value="<?php echo $financy['Financy']['id']; ?>" name="all[]"/>
		</td>
		<td>
			<?php echo $financy['Financy']['id']; ?>
		</td>
		<td>
			<?php echo $financeCategories[ $financy['Financy']['finance_categories_id'] ]; ?>
		</td>
		<td>
			<?php echo $financy['Financy']['create_date']; ?>
		</td>
		<td>
			<?php echo $financy['Financy']['amount']; ?>
		</td>
		<td>
			<?php echo $debit_options[ $financy['Financy']['debit'] ]; ?>
		</td>
		<td>
			<?php echo $number->currency($financy['Financy']['money'], 'USD', array('before' => Configure::read("currency_flag") ) ); ?>
		</td>
		<td>
			<?php echo $active_options[ $financy['Financy']['active'] ]; ?>
		</td>
		<td>
			<?php echo $financy['Financy']['user_id']; ?>
		</td>
		<td>
			<?php echo $financy['Financy']['add_ip']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $financy['Financy']['id']), array('class'=>'ex4Trigger', 'title' => __('View', true) ) ); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $financy['Financy']['id']), array('class'=>'ex4Trigger', 'title' => __('View', true) ) ); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $financy['Financy']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $financy['Financy']['id'])); ?>
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