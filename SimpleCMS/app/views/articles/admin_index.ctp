<?php 
echo $javascript->link( array('jquery.lightbox-0.5.min') );
echo $html->css( array("jquery.lightbox-0.5") );

$inline_script = <<<EOD
    $(function() {
        $('a[@rel*=lightbox]').lightBox();
    });

EOD;
echo $javascript->codeBlock($inline_script);
?>

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
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('article_categories_id');?></th>
	<th><?php echo $paginator->sort('title');?></th>
	<th><?php echo $paginator->sort('contents');?></th>
	<th><?php echo $paginator->sort('photo');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($articles as $article):
?>
	<tr>
		<td>
			<?php echo $article['Article']['id']; ?>
		</td>
		<td>
			<?php echo $article['Article']['article_categories_id']; ?>
		</td>
		<td>
			<?php echo $article['Article']['title']; ?>
		</td>
		<td>
			<?php echo $article['Article']['contents']; ?>
		</td>
		<td>
			<a rel="lightbox" href="<?php echo $html->webroot( IMAGES_URL . $article['Article']['photo'] ); ?>" title="<?php echo $article['Article']['title']; ?>">
			<?php echo $thumbnail->show($article['Article']['photo'], array('width'	=> 60, 'height'=> 60) ); ?>
			</a>
		</td>
		<td>
			<?php echo $time->format('Y-m-d H:i', $article['Article']['created']); ?>
		</td>
		<td>
			<?php echo $time->format('Y-m-d H:i', $article['Article']['modified']); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $article['Article']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $article['Article']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $article['Article']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $article['Article']['id'])); ?>
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
