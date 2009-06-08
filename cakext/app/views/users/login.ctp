<script type="text/javascript">
Ext.onReady(function(){
    Ext.QuickTips.init();
    var simple = new Ext.FormPanel({
        labelWidth: 75,
        frame:true,
        title: '<?php __('Web Office Automation'); ?>',
        bodyStyle:'padding:5px 5px 0',
        width: 350,

        defaults: {width: 150},
        defaultType: 'textfield',
        items: [{
                fieldLabel: '<?php __('User Name'); ?>',
                name: 'data[User][username]',
                allowBlank:false,
				blankText:'<?php __('Please fill up user name'); ?>'
            },new Ext.form.Field({
            	inputType:'password',
                fieldLabel: '<?php __('Password'); ?>',
                allowBlank:false,
                name: 'data[User][password]'
            })
        ],

        buttons: [{
				text: '<?php __('Login'); ?>',
				type: 'submit',
				handler:function(){
					if(simple.form.isValid()){
						simple.form.doAction('submit',{
							 url:'<?php echo $html->url("/users/login"); ?>',
							 method:'post',
							 params:'',
							 success:function(form,action){
							 		if (action.result.msg=='OK') {
										document.location='<?php echo $html->url("/"); ?>';
									} else {
										Ext.Msg.alert('<?php __('Login fail'); ?>',action.result.msg);
							 		}
							 },
							 failure:function(){
									Ext.Msg.alert('操作','服务器出现错误请稍后再试！');
							 }
                      });
					}
				}
			},{
					text: '<?php __('Reset'); ?>',
					handler:function(){simple.form.reset();}
			}]
    });

    simple.render(document.getElementById('loginForm'));
});
</script>
<div align="center" id="loginForm" style="margin-top:15%"></div>