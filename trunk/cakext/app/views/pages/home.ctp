<script type="text/javascript">
<!--
var Tree = Ext.tree;
Ext.BLANK_IMAGE_URL = 'extjs/resources/images/default/s.gif';
var root = new Tree.AsyncTreeNode({
	text: 'Ext JS',
	draggable:false,
	id:'root'
});

var tree = new Ext.tree.TreePanel({
	contentEl:'west',
	border:true,
	root:root,
	region:'west',
	id:'west-panel',
	split:true,
	width: 200,
	minSize: 175,
	maxSize: 400,
	margins:'0 0 0 0',
	layout:'accordion',
	title:"<?php __('Navigation') ?>",
	collapsible :true,
	layoutConfig:{
		animate:true
		},
	rootVisible:false,
	autoScroll:true,
	loader: new Tree.TreeLoader({
		dataUrl:'main/tree'
		})
	});
tree.on('click',treeClick);
//tree.expandAll();
var tab = new Ext.TabPanel({
	region:'center',
	deferredRender:false,
	activeTab:0,
	items:[{
		contentEl:'center2',
		title:"<?php __('Home') ?>",
		autoScroll:true
	}]
});
function treeClick(node,e) {
	 if(node.isLeaf()){
		e.stopEvent();
		var n = tab.getComponent(node.id);
		if (!n) {
			var n = tab.add({
				'id' : node.id,
				'title' : node.text,
				closable:true,
				html : '<iframe scrolling="auto" frameborder="0" width="100%" height="100%" src="<?php echo $html->url("/"); ?>'+node.attributes.url+'"></iframe>'
				});
		}
		tab.setActiveTab(n);
	 }
}
function newTab(id,text,url) {
	  var n = tab.getComponent(id);
		if (!n) {
			var n = tab.add({
				'id' : id,
				'title' : text,
				closable:true,
				html : '<iframe scrolling="auto" frameborder="0" width="100%" height="100%" src="'+url+'"></iframe>'
				});
		}
		tab.setActiveTab(n);
}
Ext.onReady(function(){
   var viewport = new Ext.Viewport({
		layout:'border',
		items:[
			new Ext.BoxComponent({
				region:'north',
				el: 'north',
				height:35
			}),
			tree,
			tab
		 ]
	});

	tree.render();
	root.expand();
});
function openWindow(id,title,url,width,height){
	var win = Ext.get(id)
	if (win) {
		win.show();
		return;
	}
	win = new Ext.Window({
		id:id,
		title:title,
		layout:'fit',
		width:width,
		height:height,
		closeAction:'close',
		collapsible:true,
		plain: true,
		html : '<iframe frameborder="0" width="100%" height="100%" src="'+url+'"></iframe>'
	});
	win.show();
}

//-->
</script>
<div id="north">
<p>WebOA System <?php echo $html->link( __('Logout', true), "/users/logout", array('target'=>'_parent'), __('Are you sure want to logout?', true), false ); ?> </p>
</div>
<div id="west"></div>
<div id="center2">test</div>
