<?php
class Administrator extends AppModel {

	var $name = 'Administrator';
	var $useTable = false;

	function getAll() {
		$item = array(
			'id'=>1,
			'user_name'=>"administrator",
			'login_type'=>"UKEY",
			'user_type'=>"系统管理员",
		);
		$data = array();
		for ($i = 0; $i < 3; $i++) {
			$data[] = $item;
		}
		return $data;
	}
}
?>