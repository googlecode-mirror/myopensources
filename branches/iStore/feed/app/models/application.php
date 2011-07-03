<?php
class Application extends AppModel {
	var $name = 'Application';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Image' => array(
				'className' => 'Image',
				'foreignKey' => 'aid',
//				'conditions' => array('Comment.status' => '1'),
				'order' => 'Image.created DESC',
				'limit' => '5',
				'dependent'=> true
			),
//		'Score' => array(
//				'className' => 'Score',
//				'foreignKey' => 'aid',
////				'conditions' => array('Comment.status' => '1'),
//				'order' => 'Score.created DESC',
//				'limit' => '3',
//				'dependent'=> true
//			)
			
	);

}
?>