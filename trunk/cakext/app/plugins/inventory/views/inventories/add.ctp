<script type="text/javascript">
Ext.onReady(function(){
	Ext.QuickTips.init();
	Ext.form.Field.prototype.msgTarget = 'side';
	var top = new Ext.FormPanel({
		buttonAlign:'right',
		labelWidth:70,
        frame:true,
        title: '<?php __('Add Inventory');?>',
        bodyStyle:'padding:5px 5px 0',
		style:'margin:10px',

		items:[{
			xtype:'fieldset',
			title:'<?php __('Add Inventory');?>',
			autoHeight:true,

			items:[{
				layout:'column',
				items:[{
//					columnWidth:.33,
					layout:'form',
					items:[{
						xtype:'textfield',
						fieldLabel:'<?php __("Name"); ?>',
						allowBlank:false,
						name:'data[Inventory][name]',
						value:'',
						anchor:'90%'
					}]
				},{
//						columnWidth:.33,
						layout:'form',
						items:[{
							xtype:'textfield',
							fieldLabel: '<?php __("Address"); ?>',
							name:'data[Inventory][address]',
							value:'',
							anchor:'90%'
						}]
					},{
//						columnWidth:.33,
						layout:'form',
						items:[{
							xtype:'textfield',
							fieldLabel: '<?php __("Phone"); ?>',
							name:'data[Inventory][phone]',
							value:'',
							anchor:'90%'
						}]
					},{
//						columnWidth:.33,
						layout:'form',
						items:[{
							xtype:'textfield',
							fieldLabel: '<?php __("Guard"); ?>',
							name:'data[Inventory][guard]',
							value:'',
							anchor:'90%'
						}]
					}]
				}]

		}],

				  buttons: [{
			            text: '<?php __("Submit"); ?>',
						handler:function(){
							if(top.form.isValid()){
								top.form.doAction('submit',{
									url:'<?php echo $html->url("/inventory/inventories/add"); ?>',
									method:'post',
									params:'',
									success:function(form,action){
										Ext.Msg.alert('操作','保存成功!');
										parent.ds.reload();
										if (Ext.get('client_id').dom.value=='') {
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
			        }]

	});

	top.render(document.body);
});
</script>
