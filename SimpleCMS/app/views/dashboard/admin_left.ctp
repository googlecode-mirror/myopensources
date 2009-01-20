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
			<li><em class="folder"></em> 123</span>
				<ul>
					<li><em class="file"></em>blabla </li>
				</ul>
			</li>
			<li><em class="folder"></em>
				<ul>
					<li><em class="folder"></em>
						<ul id="folder21">
							<li><em class="file"></em> more text</li>
							<li><em class="file"></em>and here, too</li>
						</ul>
					</li>
					<li><em class="file"></em></li>
				</ul>
			</li>
			<li class="closed"><em class="folder"></em>this is closed! 
				<ul>
					<li><em class="file"></em></li>
				</ul>
			</li>
			<li><em class="file"></em></li>
		</ul>
      	<!-- TREE END -->
      	
      </div>
    </div>
