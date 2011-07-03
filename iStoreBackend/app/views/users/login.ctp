<script>
	var win;
	var form;
	$(function(){
		win = $('#win').window({
		draggable:false,
		resizable:false,
		collapsible:false,
		closable:false,
		minimizable:false,
		maximizable:false,
		inline:true,
		modal:true
		});

	    form = win.find('form');

	});

	function reset(){
		form.form("clear");
	}

	function saveData() {
	    form.form('submit', {
	        url: 'auth',
	        onSubmit: function (){
		        return form.form('validate');
		    },
	        success: function (data) {
//	            alert(data);
	            eval('data=' + data);
	            if (data.success) {
	            	location.href = '<?php echo $html->url('/dashboard');?>';
	                win.window('close');
	            }
	            else
		        {
	                $.messager.alert('错误', data.msg, 'error');
	            }
	        }
	    });
	}

</script>

<body style="height:100%;width:100%;overflow:hidden;border:none;">

<div id="win" class="easyui-window" title="登录管理系统..." style="width:300px;height:180px;">
    <form style="padding:10px 20px 10px 40px;" method="post">
        <p>用户名: <input name="username"  type="text" class="easyui-validatebox" required="true" validType="length[1,12]"></p>
        <p>密码: <input name="passwd" type="password" class="easyui-validatebox" required="true" validType="length[1,12]"></p>
        <div style="padding:5px;text-align:center;">
            <a href="javascript:void(0)" onclick="saveData()" class="easyui-linkbutton" icon="icon-ok" >登录</a>
            <a href="javascript:void(0)" onclick="reset()" class="easyui-linkbutton" icon="icon-cancel" >重置</a>        </div>
  </form>
</div>

