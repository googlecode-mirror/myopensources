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
        <div id="footer-user">用户: <?php echo $authuser['User']['username'] ?></div>
        <em></em> 
        <div id="footer-user">角色: 管理员</div>
        <div id="footer-time">日期:<span class="jdate">2008年10月11日　星期六 </span><span class="jclock"></span> </div>
    </div>
