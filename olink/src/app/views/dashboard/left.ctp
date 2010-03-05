<?php 
echo $javascript->link( array('jquery','jquery.treeview') );
echo $html->css( array("jquery.treeview") );

$inline_script = <<<EOD
		$(function() {
			$("#browser").treeview();
		});

EOD;
echo $javascript->codeBlock($inline_script);
?>
    <div id="left-container">
   	  <div id="left-top">
      	<div id="left-text"><?php echo __("Main Menu"); ?></div>
      	<div id="left-flag">&gt;&gt;</div>
      </div>
      
      <div id="left-main">
      
  		<!-- TREE START -->    
		<ul id="browser" class="filetree">
		
			<?php foreach ($menus as $category=>$items): ?>
			
			<li><em class="folder"></em> <?php echo $category; ?></span>
				<ul>
					<?php foreach ($items as $item): ?>
					<li><a href="<?php echo $html->url($item['url']); ?>" target="mainFrame"> <em class="file"></em><?php echo $item['label']; ?></a> </li>
					<?php endforeach; ?>
				</ul>
			</li>
			<?php endforeach; ?>
			
			<li><em class="folder"></em> <?php echo __("System"); ?></span>
				<ul>
					<li><em class="file"></em><?php echo __("Backup/Restore"); ?> </li>
					<li><?php echo $html->link('<em class="file"></em>'.__('Logout', true), "/users/logout", array('target'=>'_parent'), __('Are you sure want to logout?', true), false ); ?> </li>
				</ul>
			</li>

		</ul>
      	<!-- TREE END -->
      	
      </div>
    </div>
