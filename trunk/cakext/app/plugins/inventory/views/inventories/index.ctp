<script type="text/javascript">
Ext.onReady(function(){
	var ds = new Ext.data.Store({
		proxy : new Ext.data.HttpProxy({url:'<?php echo $html->url("/inventory/inventories/getlist"); ?>'}),
        reader: new Ext.data.JsonReader({
			root: 'topics',
            totalProperty: 'totalCount',
            id: 'id'
			},[
			'id','name','address','phone','guard',{name:'created',type:'string', convert: function(v) {
	                                                 var dt = new Date.parseDate(v, 'U');
	                                                 return dt.format('Y-m-d H:i:s');}
                                                  }
      	])
    });


	var colModel = new Ext.grid.ColumnModel([
		 {header:'ID',width:50,sortable:true,dataIndex:'id'},
		 {id:'title',header:'<?php __("Name"); ?>', width:100,sortable:true,dataIndex:'name'},
		 {header:'<?php __("Address"); ?>',width:100,sortable:true,dataIndex:'address'},
		 {header:'<?php __("Phone"); ?>',width:100,sortable:true,dataIndex:'phone'},
		 {header:'<?php __("Guard"); ?>',width:100,sortable:true,dataIndex:'guard'},
		 {header:'<?php __("Created"); ?>',width:150,sortable:true,dataIndex:'created' }
		]);
	var tb = new Ext.Toolbar('north-div');//创建一个工具条

	tb.add({
		text: '<?php __("New"); ?>',
        handler: newclient
		},{
        text: '<?php __("Edit"); ?>',
        handler: editclient
		},{
        text: '<?php __("Delete"); ?>',
        handler: delclient
	});
	var grid = new Ext.grid.GridPanel({
				border:false,
				region:'center',
				loadMask: true,
				el:'center',
				title:'<?php __("Listing"); ?>',
				store: ds,
				cm: colModel,
				autoScroll: true,
				bbar: new Ext.PagingToolbar({
					pageSize: perPage(),
					store: ds,
					displayInfo: true,
					displayMsg: '第{0} 到 {1} 条数据 共{2}条',
					emptyMsg: "没有数据"
        		})
            });
	var viewport = new Ext.Viewport({
        layout:'border',
        items:[{
			  border:false,
			  region:'north',
			  contentEl:'north-div',
			  tbar:tb,
			  height:26
			},
			grid
		]}
	);
	ds.load({params:{start:0, limit:perPage() }});
	function newclient() {
		parent.openWindow('60000201','<?php __('Add Inventory');?>','<?php echo $html->url("/inventory/inventories/add"); ?>', 500, 350);
	}
	function editclient() {
		var s = grid.getSelectionModel().getSelections();
		if (s.length==0) {
			Ext.Msg.alert('出错啦','你还没有选择要操作的记录！');
		}
		for (i=0;i<s.length;i++) {
			var id = s[i].id;
			parent.openWindow('200042'+id,'<?php __('Edit Inventory');?>','<?php echo $html->url("/inventory/inventories/edit/"); ?>'+id, 500, 350);
		}
	}
	function delclient() {
		var ids = getId(grid);
		if (ids) {
			Ext.Msg.confirm('确认', '真的要删除吗？', function(btn){
				if (btn == 'yes'){
					Ext.Ajax.request({
					   url: '<?php echo $html->url("/inventory/inventories/delete/"); ?>'+ids,
					   success: function(result){
							json = Ext.util.JSON.decode(result.responseText);
							ds.reload();
							}
					});
				}
			});
		} else {
			Ext.Msg.alert('出错啦','你还没有选择要操作的记录！');
		}
	}
});
</script>
  <div id="north-div"></div>
  <div id="center"></div>



