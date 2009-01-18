<?php echo $html->doctype('xhtml-strict') ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php echo $html->charset(); ?>
	
	<title><?php echo $title_for_layout; ?></title>
	<meta name="description" content="" />
    <?php 
	    echo $html->css( array("admin_login") ); 
	    echo $scripts_for_layout;
	    echo $javascript->link( array('jquery') );
    ?>
</head>
<body>

<div id="wrap">
    <div id="content">
        <?php echo $content_for_layout ?>
        <span class="cleaner"></span>
    </div>
</div>


</body>
</html>