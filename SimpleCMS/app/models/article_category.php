<?php
class ArticleCategory extends AppModel {

	var $name = 'ArticleCategory';
	var $actsAs = array('Tree');
	var $validate = array(
		'parent_id' => array('notempty'),
	
		'name' => array(
						'notEmpty'  => array(
							 'rule'   => 'notEmpty',
									),			
						'maxlength' => array(
							'rule'    => array('maxlength', 12),
									),
				),
	
	);

}
?>