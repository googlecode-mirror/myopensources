<?php echo $html->doctype('xhtml-strict') ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php echo $html->charset(); ?>

	<title><?php echo $title_for_layout; ?></title>
	<meta name="description" content="" />
    <?php
	    echo $html->css( array("/js/themes/default/easyui.css", '/js/themes/icon.css') );
	    echo $html->script(array('jquery-1.4.4.min', 'jquery.easyui.min', 'outlook2'));
 	    echo $html->css( array("cssStyle", "append") );
	    echo $scripts_for_layout;
	    echo $javascript->link( array('jquery') );
    ?>
</head>
<body >
<div class = "divRightFrameBody">
<?php echo $this->element('breakcrumb', isset($breakcrumb) ? $breakcrumb : array() ); ?>
<?php echo $content_for_layout ?>
</div>
</body>
</html>

