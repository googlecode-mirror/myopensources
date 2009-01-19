<?php echo $html->doctype('xhtml-strict') ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php echo $html->charset(); ?>
	
	<title><?php echo $title_for_layout; ?></title>
	<meta name="description" content="" />
    <?php 
	    echo $html->css( array("admin", 'debug') ); 
	    echo $scripts_for_layout;
    ?>
</head>
<?php echo $content_for_layout ?>
</html>