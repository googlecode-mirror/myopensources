<?php echo $html->doctype('xhtml-strict') ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php echo $html->charset(); ?>
	
	<title><?php echo $title_for_layout; ?></title>
	<meta name="description" content="" />
    <?php 
	    echo $html->css( array("admin_style", 'debug') ); 
	    echo $scripts_for_layout;
	    echo $javascript->link( array('jquery', 'jquery.i18n', 'lang-zh-cn', 'jquery.form', 'admin.common', 'jquery.hotkeys', 'shotcut') );
    ?>
</head>
<body>
<!--listing -->
<div id="main-content">
<?php echo $this->element('breakcrumb', isset($breakcrumb) ? $breakcrumb : array() ); ?>

	<?php echo $content_for_layout ?>
</div>

<input type="hidden" name="logout-link" value="<?php echo $html->url("/users/logout"); ?>">

</body>
</html>

