<?php
class Department extends AccountAppModel {

	var $name = 'Department';
	var $validate = array(
		'name' => array('notempty')
	);

}
?>