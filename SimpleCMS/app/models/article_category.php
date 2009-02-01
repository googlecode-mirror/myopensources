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
	
	function delIds($id_data) {
		if (empty($id_data)) {
			return false;
		}
		$ids = implode(",", $id_data);
		$sql = "DELETE FROM article_categories WHERE id IN ({$ids})";
		$this->query($sql);
		return true;
	}
}
?>