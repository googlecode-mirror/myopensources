<?php
	$add_title 	= __('Add Inventory', true);
	$add_url 	= $html->url("/inventory/inventories/add");


	$newAction = <<<EOD
	function newAction() {
		parent.openWindow('20000101','{$add_title}','{$add_url}', 500, 350);
	}

EOD;

	$edit_title 	= __('Edit Inventory', true);
	$edit_url 	= $html->url("/inventory/inventories/edit/");


	$editAction = <<<EOD
	function editAction() {
		var s = grid.getSelectionModel().getSelections();
		if (s.length==0) {
			Ext.Msg.alert('出错啦','你还没有选择要操作的记录！');
		}
		for (i=0;i<s.length;i++) {
			var id = s[i].id;
			parent.openWindow('200042'+id,'{$edit_title}','{$edit_url}'+id, 500, 350);
		}
	}

EOD;



	echo $extgrid->create(array(
			'title' => __("Purchases Orders Listing", true),
			'ds' => array(
				'url'=>$html->url("/purchase/purch_orders/getlist"),
				'keys'=>"'supplier_id','ord_date','del_add','contact','status'",
			),
			'header' =>array(
				array('label'=>__("Supplier", true), 'dataIndex'=>'supplier_id' ),
				array('label'=>__("Order Date", true), 'dataIndex'=>'ord_date' ),
				array('label'=>__("Deliver Address", true), 'dataIndex'=>'del_add', 'width'=>300 ),
				array('label'=>__("Contact", true), 'dataIndex'=>'contact' ),
				array('label'=>__("Status", true), 'dataIndex'=>'status' ),

			),
			'perpage' => 5,
			'toolbar' => array(
				array('text'=>"'".__("New", true)."'", 'iconCls'=>"'new-icon'", 'handler'=>'newAction', 'function'=>$newAction ),
				array('text'=>"'".__("Edit", true)."'", 'iconCls'=>"'edit-icon'", 'handler'=>'editAction', 'function'=>$editAction  ),
				array('text'=>"'".__("Delete", true)."'", 'iconCls'=>"'del-icon'" ),

			),
		)
	);
?>