<?php
/**
 *
 * Thumbnail helper
 *
 * @package    App
 * @subpackage Helper
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-2-10
 * @version 1.0.0 $id$
 */
class ThumbnailHelper extends AppHelper {
	
    var $image_library 	= "gd2";//gd, gd2, magickwand
    var $maintain_ratio	= TRUE;
    var $image_file_md5;
    var $width 			= "";
    var $height 		= "";
    
	function show($image,$params) {
		//check cache the image TRUE or FALSE
		$this->image_file_md5 = $this->_getFilePathMD5($image);
		$this->_initialize($params);
		$file_name = $this->_getCacheFileName($image);
		
		$pattern = "^http://";
		if ( eregi($pattern, $image) ) {
			// remote image
			debug($file_name);
		}
		else {
			// localhost image
			debug($file_name);
			
		}
		
	}
	/**
	 * Initialize thumbnail property
	 *
	 * @author	John Meng 2009-2-10
	 * @access	private
	 * @param	array		$property
	 * @return	void
	 */
	function _initialize($property) {
		if ( count($property)>0 ) {
			foreach ($property as $key => $val) {
				$this->$key = $val;
			}
		}
	}
	
	function _getCacheFileName($image) {
		$ext = $this->_getExtension($image);
		return sprintf("w%s_h%s_%s%s", $this->width, $this->height, $this->image_file_md5, $ext);
	}
	
	
	function _getFilePathMD5($file_path) {
		return md5($file_path);
	}
	
    /**
	 * Extract the file extension
	 *
	 * @access	private
	 * @param	string
	 * @return	string
	 */
	function _getExtension($filename)
	{
		$x = explode('.', $filename);
		return '.'.end($x);
	}
	
}