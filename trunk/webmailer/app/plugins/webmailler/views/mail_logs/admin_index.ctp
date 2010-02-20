<div class="mailLogs index">
<?php echo $this->element('paginator_info');?>
<table cellpadding="0" cellspacing="0"  id="listing">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('msg');?></th>
	<th><?php echo $paginator->sort('created');?></th>
</tr>
<?php
$i = 0;
foreach ($mailLogs as $mailLog):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $mailLog['MailLog']['id']; ?>
		</td>
		<td>
			<?php echo $mailLog['MailLog']['msg']; ?>
		</td>
		<td>
			<?php echo $time->format('Y-m-d H:i', $mailLog['MailLog']['created']) ; ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<?php echo $this->element('paginator');?>
