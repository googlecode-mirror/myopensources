<form action="<?php echo preg_replace('/page:(\d+)/', '', $paginator->url()); ?>">	
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
<?php if( $paginator->counter(array( 'format' => '%pages%' )) > 1 ) : ?>
<?php __("Jump");?><input type="text" name="page" id="page" class="input_sr" style="width:20px;" value="<?php echo  $paginator->current(); ?>"/><?php __("Page");?>
<input type="submit" value="<?php __("Go");?>" />	
<?php endif;?>
</div>
</form>
