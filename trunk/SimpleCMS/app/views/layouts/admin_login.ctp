<?php echo $html->doctype('xhtml-strict') ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php echo $html->charset(); ?>
	
	<title><?php echo $title_for_layout; ?></title>
	<meta name="description" content="" />
    <?php 
	    echo $html->css( array("admin_login", 'debug') ); 
	    echo $scripts_for_layout;
	    echo $javascript->link( array('jquery') );
    ?>
</head>
<body>

<div id="wrap">
  <div id="content">
    <div id="login-contain">
    
   	  <div id="top-container">
      	<div id="left-text">Testing System</div>
      	<div id="right-text">User Login</div>
      </div>
      
      <div id="system-name">Testing Manage System V 1.0.0</div>
	  
	  <div id="login-container">
	  	<?php echo $content_for_layout ?>
	  
	  </div>
	  
    </div>
    <span class="cleaner"></span> </div>
</div>


</body>
</html>