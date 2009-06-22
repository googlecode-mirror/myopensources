<script type="text/javascript">
Ext.onReady(function(){
	Ext.QuickTips.init();
	Ext.form.Field.prototype.msgTarget = 'side';

	var ds = new Ext.data.Store({
		proxy : new Ext.data.HttpProxy({url:'<?php echo $html->url("/purchase/stock_categories/getcategories"); ?>'}),
        reader: new Ext.data.JsonReader({
			root: 'topics',
            id: 'id'
			},[
			'id','description'
      	])
    });
	ds.load();
	var top = new Ext.FormPanel({
		buttonAlign:'right',
		labelWidth:53,
		hideLabel:true,
        frame:true,
        bodyStyle:'padding:5px 5px 0',
		style:'margin:10px',
		items:[{
			layout:'column',
			items:[{
					columnWidth:.50,
					layout:'form',
					items:[{
						xtype:'textfield',
						fieldLabel:'<?php __("Code"); ?>',
						allowBlank:false,
						name:'data[Inventory][code]',
						value:'<?php echo $inventory['Inventory']['code']; ?>',
					}]
				},{
					columnWidth:.50,
					layout:'form',
					items:[{
						xtype:'combo',
						fieldLabel:'<?php __("Category"); ?>',
						store:ds,
						valueField :"id",
						displayField: "description",
						typeAhead: true,
						editable: false,
						forceSelection: true,
						triggerAction: 'all',
						mode: 'local',
						name:'data[Inventory][categoryid]',
						value:'<?php echo $inventory['Inventory']['categoryid']; ?>',
					}]
				},{
					columnWidth:.40,
					layout:'form',
					items:[{
						xtype:'textfield',
						fieldLabel:'<?php __("Barcode"); ?>',
						allowBlank:false,
						name:'data[Inventory][barcode]',
						value:'<?php echo $inventory['Inventory']['code']; ?>',
					}]
				},{
					labelWidth:35,
					columnWidth:.30,
					layout:'form',
					items:[{
						xtype:'textfield',
						fieldLabel:'<?php __("Units"); ?>',
						allowBlank:false,
						width:70,
						name:'data[Inventory][units]',
						value:'<?php echo $inventory['Inventory']['code']; ?>',
					}]
				},{
					columnWidth:.30,
					labelWidth:35,
					layout:'form',
					items:[{
						xtype:'textfield',
						fieldLabel:'<?php __("Weight"); ?>',
						allowBlank:false,
						width:70,
						name:'data[Inventory][kgs]',
						value:'<?php echo $inventory['Inventory']['code']; ?>'
					}]
				},{
		            xtype: 'fileuploadfield',
		            id: 'form-file',
		            emptyText: 'Select an image',
		            fieldLabel: 'Photo',
		            name: 'photo-path',
		            buttonCfg: {
		                text: '',
		                iconCls: 'upload-icon'
		            }
		        }


			]
		}],

		buttons: [{
	            text: '<?php __("Submit"); ?>',
				handler:function(){
					if(top.form.isValid()){
						top.form.doAction('submit',{
							url:'<?php echo isset($act) ? $html->url("/inventory/inventories/edit/".$inventory['Inventory']['id']) : $html->url("/inventory/inventories/add"); ?>',
							method:'post',
							params:'',
							success:function(form,action){
								Ext.Msg.alert('操作','保存成功!');
								parent.ds.reload();
								if (Ext.get('id').dom.value=='') {
									top.form.reset();
								}
							},
							failure:function(){
								Ext.Msg.alert('操作','服务器出现错误请稍后再试！');

							}
	                    });
					}
				}
	        },{
	        	text: '<?php __("Reset"); ?>',
				handler:function(){top.form.reset();}
	        }

	      ]

	});

	top.render(document.body);
});
</script>
