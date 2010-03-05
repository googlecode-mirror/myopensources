<?php 
echo $javascript->link( array('jquery', 'jquery.jclock', 'jquery.jdate') );
$inline_script = <<<EOD
		$(function() {
			$('.jdate').jdate();
			$('.jclock').jclock();
		});

EOD;
echo $javascript->codeBlock($inline_script);
?>
    <div id="footer">
        <div id="footer-user"><?php __("User"); ?>: <?php echo $authuser['User']['username'] ?></div>
        <em></em> 
        <div id="footer-user"><?php __("Role"); ?>: <?php __("Admin"); ?></div>
        <div id="footer-time"><?php __("Time"); ?>:<span class="jdate">2008-10-11　Sun </span><span class="jclock"></span> </div>
    </div>
