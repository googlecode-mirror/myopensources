<?php
echo $modal->init('ex4');
?>

<div class="mailServers index">
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<form id='list-form' action='<?php echo $html->url("/admin/webmailler/mail_servers/delSelected");?>' method='POST'>
<table cellpadding="0" cellspacing="0">
<tr>
	<th width="40px"><input id="select_all" type="checkbox" /></th>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('host');?></th>
	<th><?php echo $paginator->sort('ssl');?></th>
	<th><?php echo $paginator->sort('port');?></th>
	<th><?php echo $paginator->sort('account');?></th>
	<th><?php echo $paginator->sort('passwd');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($mailServers as $mailServer):
?>
	<tr>
		<td>
			<input id="all[]" type="checkbox" value="<?php echo $mailServer['MailServer']['id']; ?>" name="all[]"/>
		</td>
		<td>
			<?php echo $mailServer['MailServer']['id']; ?>
		</td>
		<td>
			<?php echo $mailServer['MailServer']['host']; ?>
		</td>
		<td>
			<?php echo $mailServer['MailServer']['ssl']; ?>
		</td>
		<td>
			<?php echo $mailServer['MailServer']['port']; ?>
		</td>
		<td>
			<?php echo $mailServer['MailServer']['account']; ?>
		</td>
		<td>
			<?php echo $mailServer['MailServer']['passwd']; ?>
		</td>
		<td>
			<?php echo $time->format('Y-m-d H:i', $mailServer['MailServer']['created']) ; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $mailServer['MailServer']['id']), array('class'=>'ex4Trigger', 'title' => __('Edit', true) ) ); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $mailServer['MailServer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mailServer['MailServer']['id'])); ?>
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
