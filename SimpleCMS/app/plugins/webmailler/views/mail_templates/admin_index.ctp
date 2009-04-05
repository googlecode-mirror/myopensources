<?php
echo $modal->init('ex4');
?>

<div class="mailTemplates index">
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<form id='list-form' action='<?php echo $html->url("/admin/webmailler/mail_templates/delSelected");?>' method='POST'>
<table cellpadding="0" cellspacing="0">
<tr>
	<th width="40px"><input id="select_all" type="checkbox" /></th>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('title');?></th>
	<th><?php echo $paginator->sort('subject');?></th>
	<th><?php echo $paginator->sort('plain_text');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
foreach ($mailTemplates as $mailTemplate):
?>
	<tr>
		<td>
			<input id="all[]" type="checkbox" value="<?php echo $mailTemplate['MailTemplate']['id']; ?>" name="all[]"/>
		</td>
		<td>
			<?php echo $mailTemplate['MailTemplate']['id']; ?>
		</td>
		<td>
			<?php echo $mailTemplate['MailTemplate']['title']; ?>
		</td>
		<td>
			<?php echo $mailTemplate['MailTemplate']['subject']; ?>
		</td>
		<td>
			<?php echo $mailTemplate['MailTemplate']['plain_text'] ? __("Yes", TRUE) : __("No", TRUE); ?>
		</td>
		<td>
			<?php echo $time->format('Y-m-d H:i', $mailTemplate['MailTemplate']['created']) ; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Send', true), array('action'=>'send', $mailTemplate['MailTemplate']['id']), array('class'=>'ex4Trigger', 'title' => __('Send Mail', true) )); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $mailTemplate['MailTemplate']['id']) ); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $mailTemplate['MailTemplate']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mailTemplate['MailTemplate']['id'])); ?>
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
