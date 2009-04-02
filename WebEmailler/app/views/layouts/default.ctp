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
		<?php __('WebEmailler'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->css('extjs/ext-all');
		echo $javascript->link( array(
									'extjs/adapter/ext/ext-base',
									'extjs/ext-all.js',
								) );
		echo $scripts_for_layout;
	?>
	<script type="text/javascript">
	Ext.BLANK_IMAGE_URL = '<?php echo $html->url("/img/extjs/default/s.gif");?>';
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
                    title:'West',
                    split:true,
                    width: 200,
                    minSize: 175,
                    maxSize: 400,
                    collapsible: true,
                    margins:'0 0 0 5',
                    items: [{
                        contentEl: 'west',
                        title:'Navigation',
                        border:false,
                        iconCls:'nav'
                    }]
                },
                new Ext.TabPanel({
                    region:'center',
                    deferredRender:false,
                    activeTab:0,
                    items:[{
                        contentEl:'center1',
                        title: 'Close Me',
                        autoScroll:true
                    }]
                })
             ]
        });
    });
	</script>
	
</head>
<body>
  <div id="north">
    <p><?php echo $html->link(__('CakePHP: the rapid development php framework', true), 'http://cakephp.org'); ?></p>
  </div>
  <div id="west">
  	<p>
	 	<ul>
		 	<li><?php echo $html->link(__("Mail Templates", true), "/mail_template");?></li>
		 	<li><?php echo $html->link(__("Customers", true), "/customer");?></li>
		 	<li><?php echo $html->link(__("Mail Servers", true), "/mail_server");?></li>
	 	</ul>
 	</p>
  </div>
  <div id="center1">
        <p>
			<?php $session->flash(); ?>

			<?php echo $content_for_layout; ?>
			<?php echo $cakeDebug; ?>
        
        </p>

  </div>

  <div id="props-panel" style="width:200px;height:200px;overflow:hidden;">
  </div>
</body>
</html>