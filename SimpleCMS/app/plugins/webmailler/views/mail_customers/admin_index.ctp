<?php
echo $modal->init('ex4');
?>

<div class="mailCustomers index">
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<form id='list-form' action='<?php echo $html->url("/admin/webmailler/mail_customers/delSelected");?>' method='POST'>
<table cellpadding="0" cellspacing="0">
<tr>
	<th width="40px"><input id="select_all" type="checkbox" /></th>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('Categories', 'mail_customer_category_id');?></th>
	<th><?php echo $paginator->sort('nickname');?></th>
	<th><?php echo $paginator->sort('gender');?></th>
	<th><?php echo $paginator->sort('email');?></th>
	<th><?php echo $paginator->sort('tel');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
foreach ($mailCustomers as $mailCustomer):
?>
	<tr>
		<td>
			<input id="all[]" type="checkbox" value="<?php echo $mailCustomer['MailCustomer']['id']; ?>" name="all[]"/>
		</td>
		<td>
			<?php echo $mailCustomer['MailCustomer']['id']; ?>
		</td>
		<td>
			<?php echo $mailCustomer['MailCustomerCategory']['name']; ?>
		</td>
		<td>
			<?php echo $mailCustomer['MailCustomer']['nickname']; ?>
		</td>
		<td>
			<?php echo $gender_options[ $mailCustomer['MailCustomer']['gender'] ]; ?>
		</td>
		<td>
			<?php echo $mailCustomer['MailCustomer']['email']; ?>
		</td>
		<td>
			<?php echo $mailCustomer['MailCustomer']['tel']; ?>
		</td>
		<td>
			<?php echo $time->format('Y-m-d H:i', $mailCustomer['MailCustomer']['created']) ; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $mailCustomer['MailCustomer']['id']), array('class'=>'ex4Trigger', 'title' => __('View', true) ) ); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $mailCustomer['MailCustomer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mailCustomer['MailCustomer']['id'])); ?>
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

