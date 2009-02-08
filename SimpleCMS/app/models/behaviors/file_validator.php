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
	
	function setup($model) {
		$this->_model 	= $model;
	}
	
	function fileMaxsize($model, $data, $maxsize=2097152 ) {
		$file_data = $data[key($data)];
		return ( $file_data['size']>0 && $file_data['size']<$maxsize );
	}
	
}