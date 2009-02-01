<!-- breakcrumb -->
<div id="breakcrumb">
  <div id="b-left"></div>
  <div id="b-main">
  	<span>当前位置: 首页
  	<?php if( isset($nav) ):?>
  		<?php foreach($nav as $item):?>
  			-&gt;
  			<?php if( isset($item['url']) && $item['url'] ): ?>
  				<?php echo $html->link($item['text'], $item['url'] ); ?>
  			<?php else: ?>
  				<?php echo $item['text'] ; ?>
  			<?php endif; ?>
  		<?php endforeach;?>
  	<?php endif;?>
  	</span>
    <?php if(isset($actions) ):?>
  	<div id="b-actions">
    	<div id="act-left"></div>
    	<div id="act-main">
        	<ul>
        		<?php foreach($actions as $action):?>
            	<li><?php echo $html->link('<em class="'.$action['class'].'"></em>' . $action['text'], $action['url'], null, isset($action['js']) ? $action['js'] : null, false); ?></li>
            	<?php endforeach;?>
            </ul>
      </div>
	<?php endif;?>      
    	<div id="act-right"></div>
    </div>
  </div>
  <div id="b-right"></div>
</div>