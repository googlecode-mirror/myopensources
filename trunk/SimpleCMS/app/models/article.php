<?php
class Article extends AppModel {

	var $name = 'Article';
	var $validate = array(
		'title' => array('notempty'),
		'contents' => array('notempty'),
//		'photo' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'ArticleCategory' => array('className' => 'ArticleCategories',
								'foreignKey' => 'article_categories_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

}
?>