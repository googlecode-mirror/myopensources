<!-- breakcrumb -->
<?php if( isset($nav) ):?>
<div class = "divManageHead">
  		<?php $i=0; foreach($nav as $item): ?>
  		<?php if($i >0) echo "&gt;&gt;";?>
  			<?php if( isset($item['url']) && $item['url'] ): ?>
  				<?php echo $html->link($item['text'], $item['url'] ); ?>
  			<?php else: ?>
  				<?php echo $item['text'] ; ?>
  			<?php endif; ?>
  		<?php $i++; endforeach;?>
</div>
<?php endif;?>

