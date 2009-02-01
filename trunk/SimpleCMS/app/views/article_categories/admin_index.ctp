
<div class="articleCategories index">
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<form id='list-form' action='<?php echo $html->url("/admin/article_categories/delSelected");?>' method='POST'>
<table cellpadding="0" cellspacing="0">
<tr>
	<th width="40px"><input id="select_all" type="checkbox" /></th>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('parent_id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
foreach ($articleCategories as $articleCategory):
?>
	<tr>
		<td>
			<input id="all[]" type="checkbox" value="<?php echo $articleCategory['ArticleCategory']['id']; ?>" name="all[]"/>
		</td>
		<td>
			<?php echo $articleCategory['ArticleCategory']['id']; ?>
		</td>
		<td style="text-align:left;" >
			<?php echo $categories[ $articleCategory['ArticleCategory']['parent_id'] ]; ?>
		</td>
		<td style="text-align:left;" >
			<?php echo $articleCategory['ArticleCategory']['name']; ?>
		</td>
		<td>
			<?php echo $time->format('Y-m-d H:i', $articleCategory['ArticleCategory']['created']); ?>
		</td>
		<td>
			<?php echo $time->format('Y-m-d H:i', $articleCategory['ArticleCategory']['modified']); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $articleCategory['ArticleCategory']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $articleCategory['ArticleCategory']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $articleCategory['ArticleCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articleCategory['ArticleCategory']['id'])); ?>
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
