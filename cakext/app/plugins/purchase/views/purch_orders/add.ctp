<script type="text/javascript">
//Ext.util.CSS.swapStyleSheet("theme", "ext/resources/css/xtheme-" + themeName + ".css");

Ext.onReady(function(){

    // shorthand alias
    var fm = Ext.form;

	var ds = new Ext.data.Store({
		proxy : new Ext.data.HttpProxy({url:'<?php echo $html->url("/purchase/purch_orders/jsnone"); ?>'}),
        reader: new Ext.data.JsonReader({
			},[
			'name','quantity'
      	])
    });


	var colModel = new Ext.grid.ColumnModel([
		 {
			 header:'<?php __("Name");?>',
			 width:100,
			 sortable:true,
			 dataIndex:'name',
	         editor: new fm.TextField({
	               allowBlank: false
	           })

		 },
		 {
			 header:'<?php __("Quantity");?>',
			 width:160,
			 sortable:true,
			 dataIndex:'quantity'
		 }
		]);

    var Product = Ext.data.Record.create([
           // the "name" below matches the tag name to read, except "availDate"
           // which is mapped to the tag "availability"
           {name: 'name', type: 'string'},
           {name: 'quantity', type: 'float'},
       ]);

    var proName = new Ext.form.ComboBox({
        store: ds,
        displayField:'state',
        typeAhead: true,
        mode: 'local',
        triggerAction: 'all',
        emptyText:'Select a state...',
        selectOnFocus:true,
        width:120
    });

    var ordQuantity = new Ext.form.TextField ({
		emptyText:'Quantity',
		width:55
    });

    var unitPrice = new Ext.form.TextField ({
		emptyText:'Uint Price',
		width:60
    });

    Ext.QuickTips.init();
    Ext.form.Field.prototype.msgTarget = 'side';
    var top=new Ext.FormPanel({
        buttonAlign:'right',
		labelWidth:40,
        frame:false,
        border:false,
        bodyStyle:'padding:5px 5px 0',
		width:240,
		defaults: {width: 175},
		defaultType: 'textfield',
        items: [{
        		xtype:'numberfield',
        		allowDecimals:false,
        		id:'di_value',
                fieldLabel: '值',
                allowBlank:false,
                validator:function(v) {
                	if (v=='0') {
                		return false;
                	}
                	return true;
                },
                name: 'di_value'
            },{
                fieldLabel: '名称',
                id:'di_caption',
                allowBlank:false,
                name: 'di_caption'
            },{
				xtype:'hidden',
				name: 'di_id',
				id:'di_id',
				value: ''
			},{
				xtype:'hidden',
				name: 'dd_id',
				value: ''
			}],

        buttons: [{
            text: '<?php __("Purchase"); ?>',
				handler:function(){
					if(top.form.isValid()){
						alert("test");
//						top.form.doAction('submit',{
//							 url:'index.php?model=dd&action=save',
//							 method:'post',
//							 params:'',
//							 success:function(form,action){
//							 	if (action.result.msg!='OK') {
//							 		Ext.Msg.alert('出错啦',action.result.msg);
//							 	} else {
//							 		Ext.Msg.alert('操作','保存成功!');
//							 		ds.reload();
//							 		top.form.reset();
//							 	}
//							 },
//							 failure:function(){
//									Ext.Msg.alert('操作','服务器出现错误请稍后再试！');
//							 }
//                      });
					}
					}
        },{
            text: '重置',
			handler:function(){top.form.reset();}
        }]
    });

	var grid = new Ext.grid.GridPanel({
		border:false,
		region:'center',
		loadMask: true,
		el:'center',
		title:'<?php __("Purchase Products");?>',
		store: ds,
		cm: colModel,
		autoScroll: true,

		buttons:[
		proName,
		ordQuantity,
		unitPrice,
		{
            text: '<?php __("Add"); ?>',
            handler : function(){
            	var p_name = proName.getRawValue();
            	var p_quantity = ordQuantity.getRawValue();
            	var p_u_price = unitPrice.getRawValue();
                var p = new Product({
                    name: p_name,
                    quantity: p_quantity
                });

                ds.insert(0, p);
           }

        },
		{
            text: '<?php __("New Product"); ?>',
        },
		{
            text: '删除',
			handler:function(){
				var ids = getIds(grid);
				if (ids) {
					Ext.Msg.confirm('确认', '真的要删除1吗？', function(btn){
						if (btn == 'yes'){
							Ext.Ajax.request({
							   url: 'index.php?model=dd&action=delete&ids='+ids,
							   success: function(result){
									ds.reload();
									}
							});
						}
					});

				} else {
					Ext.Msg.alert('出错啦','你还没有选择要操作的记录！');
				}
			}
        }


        ]
    });

	var viewport = new Ext.Viewport({
        layout:'border',
        items:[
			grid,{
				region:'south',
				title:'<?php __("Purchase Info"); ?>',
				collapsible: true,
				height: 130,
				border:false,
				items:top
                }
		]}
	);
	ds.load({params:{start:0, limit:30, forumId: 4}});
});

</script>
  <div id="north-div"></div>
  <div id="center"></div>