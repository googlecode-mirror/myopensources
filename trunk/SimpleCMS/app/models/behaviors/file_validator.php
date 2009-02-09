<?php
/**
 *
 * File description
 *
 * @package    App
 * @subpackage Behavior
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-2-8
 * @version 1.0.0 $id$
 */

class FileValidatorBehavior extends ModelBehavior {
	
	var $_model;
	
    /**
     * The mime types that are allowed for images
     */
    var $allowed_mime_types = array('image/jpeg','image/pjpeg','image/gif','image/png');
    
		
	function setup($model) {
		$this->_model 	= $model;
	}
	
	function fileMaxsize($model, $data, $maxsize=2097152 ) {
		$file_data = $data[key($data)];
		return ($file_data['size'] < $maxsize );
	}
	
	function fileNotEmpty($model, $data) {
		$file_data = $data[key($data)];
		return ($file_data['size'] > 0 );
	}
	
	function fileMimeType($model, $data, $mime_type = array()) {
		if ( empty($mime_type) ) {
			$mime_type = $this->allowed_mime_types;
		}
		$file_data = $data[key($data)];
		if ($file_data['size'] ==0) {
			return true;
		}
		return in_array($file_data['type'], $mime_type);
	}
	
	
}