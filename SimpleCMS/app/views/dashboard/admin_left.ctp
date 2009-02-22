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
			<li><em class="folder"></em> <?php echo __("Article"); ?></span>
				<ul>
					<li><a href="<?php echo $html->url("/admin/article_categories"); ?>" target="mainFrame"> <em class="file"></em><?php echo __("Categories"); ?></a> </li>
					<li><a href="<?php echo $html->url("/admin/articles"); ?>" target="mainFrame"> <em class="file"></em><?php echo __("Listing"); ?></a> </li>
				</ul>
			</li>
			
			<li><em class="folder"></em> <?php echo __("Products"); ?></span>
				<ul>
					<li><em class="file"></em><?php echo __("Categories"); ?> </li>
					<li><em class="file"></em><?php echo __("Listing"); ?> </li>
				</ul>
			</li>
			
			<li><em class="folder"></em> <?php echo __("Finance"); ?></span>
				<ul>
					<li><a href="<?php echo $html->url("/admin/finance/finance_categories"); ?>" target="mainFrame"> <em class="file"></em><?php echo __("Categories"); ?></a> </li>
					<li><a href="<?php echo $html->url("/admin/finance/financies"); ?>" target="mainFrame"> <em class="file"></em><?php echo __("Listing"); ?></a> </li>
				</ul>
			</li>
			
			<li><em class="folder"></em> <?php echo __("Users"); ?></span>
				<ul>
					<li><em class="file"></em><?php echo __("Categories"); ?> </li>
					<li><em class="file"></em><?php echo __("Listing"); ?> </li>
				</ul>
			</li>

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
