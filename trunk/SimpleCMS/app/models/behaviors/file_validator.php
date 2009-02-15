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
		if (!is_array($data) ) {
			return false;
		}
		
		$file_data = $data[key($data)];
		return (isset($file_data['size']) && ($file_data['size'] < $maxsize) );
	}
	
	function fileNotEmpty($model, $data) {
		if (!is_array($data) ) {
			return false;
		}
		$file_data = $data[key($data)];
		return (isset($file_data['size']) && ($file_data['size'] > 0) );
	}
	
	function fileMimeType($model, $data, $mime_type = array()) {
		if (!is_array($data) ) {
			return false;
		}
		if ( empty($mime_type) ) {
			$mime_type = $this->allowed_mime_types;
		}
		$file_data = $data[key($data)];
		if (isset($file_data['size']) && ($file_data['size'] ==0) ) {
			return true;
		}
		return ( isset($file_data['type']) && in_array($file_data['type'], $mime_type) );
	}
	
	
}