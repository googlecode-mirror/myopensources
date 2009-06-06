<?php
class MainController extends AppController {

	var $name = 'Main';
	var $uses = array();

	function tree() {
		$this->autoRender = false;
		$trees['root'][] = array('id'=>'100000','text'=>__('Customers', true),'leaf'=>false, 'cls'=>'folder');
		$trees['100000'][] = array('id'=>'100001','text'=>__('Listing', true),'leaf'=>true, 'cls'=>'file','url'=>'http://www.google.com');
		$trees['root'][] = array('id'=>'200000','text'=>__('Inventer', true),'leaf'=>false, 'cls'=>'folder');
		$trees['200000'][] = array('id'=>'200010','text'=>__('Listing', true),'leaf'=>true, 'cls'=>'file','url'=>'http://www.baidu.com');
		$result = $trees[$_REQUEST['node']];
		echo json_encode($result);
	}



}
?>