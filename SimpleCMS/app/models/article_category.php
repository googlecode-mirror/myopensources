<?php
class ArticleCategory extends AppModel {

	var $name = 'ArticleCategory';
	var $validate = array(
		'pid' => array('notempty'),
		'name' => array('notempty')
	);

}
?>