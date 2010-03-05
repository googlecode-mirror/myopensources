<div class="administrator view">
<h2><?php  __('Administrator');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Administrator', true), array('action' => 'edit', $administrator['Administrator'][''])); ?> </li>
		<li><?php echo $html->link(__('Delete Administrator', true), array('action' => 'delete', $administrator['Administrator']['']), null, sprintf(__('Are you sure you want to delete # %s?', true), $administrator['Administrator'][''])); ?> </li>
		<li><?php echo $html->link(__('List Administrator', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Administrator', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
