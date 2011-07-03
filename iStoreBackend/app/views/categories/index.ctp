
<script>
	var grid;
	var win;
	var form;
	var searchWin;
	var searchForm;
	
	$(function(){
	    win = $('#eidt-window').window({
	        closed: true,
	        modal: true,
	        shadow: false
	    });
	    form = win.find('form');

	    $('#btn-search,#btn-search-cancel').linkbutton();
	    searchWin = $('#search-window').window({
	        closed: true,
	        modal: true
	    });
	    searchForm = searchWin.find('form');

	    grid = $('#tt2').datagrid({
			width:600,
			height:350,
			nowrap: false,
			striped: true,
			fit: true,
			url:'categories/listing',
			sortName: 'id',
			sortOrder: 'desc',
			idField:'id',
			frozenColumns:[[
                {field:'ck',checkbox:true},
			]],
			columns:[[
				{field:'id',title:'ID',width:120},
				{field:'pid',title:'类别',width:120},
				{field:'name',title:'名称',width:120,sortable:true},
				{field:'created',title:'创建日期',width:150,rowspan:2,
                        formatter:function(val){
							var date = new Date(val*1000);

                                return date.getFullYear().toString()+"/"+date.getMonth()+"/"+date.getDate();
                        }

				}
			]],
	        toolbar:[{
				            text: '新增',
				            iconCls: 'icon-add',
				            handler: add
				        }, '-', {
				            text: '修改',
				            iconCls: 'icon-edit',
				            handler: edit
				        }, '-', {
				            text: '删除',
				            iconCls: 'icon-remove',
				            handler: del
				        }, '-', {
				            text: '查找',
				            iconCls: 'icon-search',
				            handler: OpensearchWin
				        }, '-', {
				            text: '所有',
				            iconCls: 'icon-search',
				            handler: showAll
				        }],
			pageSize:<?php echo $pageSize;?>,
			pagination:true,
			rownumbers:true
		});

		
	});

	    function getSelectedArr() {
	        var ids = [];
	        var rows = grid.datagrid('getSelections');
	        for (var i = 0; i < rows.length; i++) {
	            ids.push(rows[i].id);
	        }
	        return ids;
	    }

	    function getSelectedID() {
	        var ids = getSelectedArr();
	        return ids.join(',');
	    }

	    function arr2str(arr) {
	        return arr.join(',');
	    }

		function saveData() {
		    form.form('submit', {
		        url: form.url,
		        onSubmit: function (){
			        return form.form('validate');
			    },
		        success: function (data) {
//		            alert(data);
		            eval('data=' + data);
		            if (data.success) {
		                grid.datagrid('reload');
		                win.window('close');
		            }
		            else
			        {
		                $.messager.alert('错误', data.msg, 'error');
		            }
		        }
		    });
		}
		function edit() {
		    var rows = grid.datagrid('getSelections');
		    var num = rows.length;
		    if (num == 0) {
		        $.messager.alert('提示', '请选择一条记录进行操作!', 'info');
		        return;
		    }
		    else if (num > 1) {
		        $.messager.alert('提示', '您选择了多条记录,只能选择一条记录进行修改!', 'info');
		        return;
		    }
		    else{
		        win.window('open');
		        form.form('load', 'categories/edit/' + rows[0].id);
	//	        #editform
		        form.url = 'categories/edit';
		    }
		}

		function del() {
		    var arr = getSelectedArr();
		    if (arr.length>0) {
		        $.messager.confirm('提示信息', '您确认要删除吗?', function (data) {
		            if (data) {
		                $.ajax({
		                    url: 'categories/delSelected/' + arr2str(arr),
		                    type: 'GET',
		                    error: function () {
		                        $.messager.alert('错误', '删除失败!', 'error');
		                    },
		                    success: function (data) {
		                        eval('data=' + data);
		                        if (data.success) {
		                            grid.datagrid('reload');
		                            grid.datagrid('clearSelections');
		                        } else {
		                            $.messager.alert('错误', data.msg, 'error');
		                        }
		                    }
		                });
		            }
		        });
		    } else {
		        $.messager.show({
		            title: '警告',
		            msg: '请先选择要删除的记录。'
		        });
		    }
		}

		function showAll() {
		    grid.datagrid({ url: 'categories/listing' , queryParams: {} });
		}

		function add() {
		    win.window('open');
		    form.form('clear');
		    form.url = 'categories/add';
		}


		function OpensearchWin() {
		    searchWin.window('open');
		    searchForm.form('clear');
		}


		function closeWindow() {
		    win.window('close');
		}

		function SearchOK() {
		    var s_name = $("#s_name").val();
		    searchWin.window('close');
		    grid.datagrid({ url: 'categories/listing', queryParams: {name: s_name} });
		}
		function closeSearchWindow() {
		    searchWin.window('close');
		}
		$('body').layout();
		
	</script>
<table id="tt2"></table>

<div id="eidt-window" title="编辑窗口" style="width: 350px; height: 200px;">
<div style="padding: 20px 20px 40px 80px;">
<div class="users form" id="editform"><?php echo $this->Form->create('User');?>
<table>
	<tr>
		<td>用户名:</td>
		<td><input name="username" class="easyui-validatebox" required="true"
			validType="length[1,12]"></td>
	</tr>
	<tr>
		<td>密码:</td>
		<td><input name="passwd" type="password" class="easyui-validatebox"
			required="true" validType="length[1,12]"></td>
	</tr>
</table>

<input name="id" type="hidden"> <?php echo $this->Form->end(null);?></div>
</div>
<div style="text-align: center; padding: 5px;"><a
	href="javascript:void(0)" onclick="saveData()" id="btn-save"
	class="easyui-linkbutton" icon="icon-ok">保存</a> <a
	href="javascript:void(0)" onclick="closeWindow()" id="btn-cancel"
	class="easyui-linkbutton" icon="icon-cancel"> 取消</a></div>
</div>
<div id="search-window" title="查询窗口"
	style="width: 350px; height: 200px;">
<div style="padding: 20px 20px 40px 80px;">
<form method="post">
<table>
	<tr>
		<td>名称：</td>
		<td><input name="s_name" id="s_name" style="width: 150px;" /></td>
	</tr>
</table>
</form>
</div>
<div style="text-align: center; padding: 5px;"><a
	href="javascript:void(0)" onclick="SearchOK()" id="btn-search"
	icon="icon-ok">确定</a> <a href="javascript:void(0)"
	onclick="closeSearchWindow()" id="btn-search-cancel" icon="icon-cancel">
取消</a></div>
</div>