<?php
/**
 *
 * Article model
 * File: /app/models/article.php
 * @package    App
 * @subpackage Model
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-2-8
 * @version 1.0.0 $id$
 */
App::import("Vendor", "Validate_File", array('file' => 'Validate'.DS.'File.php') );

class Article extends AppModel {

	var $name = 'Article';
	
	var $actsAs = array('FileValidator');
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'ArticleCategory' => array('className' => 'ArticleCategories',
								'foreignKey' => 'article_categories_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

	function beforeValidate($options = array()) {
		
		$this->validate = array(
		
			'title' => array('notempty'),
		
			'contents' => array('notempty'),
		
			'photo' => array(
		            'fileNotEmpty' => array(
		                      'rule' =>'fileNotEmpty',
		                      'message' => __("Please upload an image file", true),
		             ),
		             
		            'fileMaxsize' => array(
		                      'rule' =>array("fileMaxsize", 1024*1024*2),
		                      'message' => __("Upload file size too large", true),
		             ),
		             
		            'fileMimeType' => array(
		                      'rule' =>array("fileMimeType", array('image/jpeg','image/pjpeg','image/gif','image/png') ),
		                      'message' => __("Upload file format incorrect ,please upload an image", true),
		             ),
		             
             ),
		             
		);
		
	}

	
}
?>