<?php
class MainController extends AppController {

	var $name = 'Main';
	var $uses = array();

	function tree() {
		$this->autoRender = false;
		$trees['root'][] = array('id'=>'100000','text'=>'个人管理专区','leaf'=>false, 'cls'=>'folder');
		$trees['100000'][] = array('id'=>'100001','text'=>'修改我的资料','leaf'=>true, 'cls'=>'file','url'=>'http://www.google.com');
		$trees['root'][] = array('id'=>'200000','text'=>'业务信息管理','leaf'=>false, 'cls'=>'folder');
		$trees['200000'][] = array('id'=>'200010','text'=>'出售管理','leaf'=>true, 'cls'=>'file','url'=>'http://www.baidu.com');
		$result = $trees[$_REQUEST['node']];
		echo json_encode($result);
	}



}
?>