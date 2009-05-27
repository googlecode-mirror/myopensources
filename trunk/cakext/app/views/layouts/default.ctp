<?php
/* SVN FILE: $Id: default.ctp 7945 2008-12-19 02:16:01Z gwoo $ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @version       $Revision: 7945 $
 * @modifiedby    $LastChangedBy: gwoo $
 * @lastmodified  $Date: 2008-12-18 18:16:01 -0800 (Thu, 18 Dec 2008) $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $scripts_for_layout;
	?>
	<link rel="stylesheet" type="text/css" href="<?php echo $html->url('/extjs/resources/css/ext-all.css'); ?>" />
    
    <!-- GC -->
 	<!-- LIBS -->
 	<script type="text/javascript" src="<?php echo $html->url('/extjs/adapter/ext/ext-base.js'); ?>"></script>
 	<!-- ENDLIBS -->

    <script type="text/javascript" src="<?php echo $html->url('/extjs/ext-all.js'); ?>"></script>

	<style type="text/css">
	html, body {
        font:normal 12px verdana;
        margin:0;
        padding:0;
        border:0 none;
        overflow:hidden;
        height:100%;
    }
	p {
	    margin:5px;
	}
    .settings {
        background-image:url(<?php echo $html->url('/img/folder_wrench.png'); ?>);
    }
    .nav {
        background-image:url(<?php echo $html->url('/img/folder_go.png'); ?>);
    }
    </style>
	<script type="text/javascript">
    Ext.onReady(function(){

        // NOTE: This is an example showing simple state management. During development,
        // it is generally best to disable state management as dynamically-generated ids
        // can change across page loads, leading to unpredictable results.  The developer
        // should ensure that stable state ids are set for stateful components in real apps.
        Ext.state.Manager.setProvider(new Ext.state.CookieProvider());
        
       var viewport = new Ext.Viewport({
            layout:'border',
            items:[
                new Ext.BoxComponent({ // raw
                    region:'north',
                    el: 'north',
                    height:32
                }), {
                    region:'west',
                    id:'west-panel',
                    title:'Menu',
                    split:true,
                    width: 200,
                    minSize: 175,
                    maxSize: 400,
                    collapsible: true,
                    margins:'0 0 0 5',
                    layout:'accordion',
                    layoutConfig:{
                        animate:true
                    },
                    items: [{
                        contentEl: 'west',
                        title:'Navigation',
                        border:false,
                        iconCls:'nav'
                    },{
                        title:'Settings',
                        html:'<p>Some settings in here.</p>',
                        border:false,
                        iconCls:'settings'
                    }]
                },
                new Ext.TabPanel({
                    region:'center',
                    deferredRender:false,
                    activeTab:0,
                    items:[{
                        contentEl:'center1',
                        title: 'Main',
                        closable:false,
                        autoScroll:true
                    }]
                })
             ]
        });
    });
	</script>
    
</head>
<body>

  <div id="west">
    <p>Hi. I'm the west panel.</p>
  </div>
  <div id="north">
    <p>north - generally for menus, toolbars and/or advertisements</p>
  </div>
  <div id="center1">
			<?php $session->flash(); ?>

			<?php echo $content_for_layout; ?>
			<?php echo $cakeDebug; ?>
  </div>


	
</body>
</html>