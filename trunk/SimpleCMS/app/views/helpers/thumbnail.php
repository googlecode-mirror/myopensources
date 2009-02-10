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
    var $width;
    var $height;
    
	function show($image,$params) {
		;
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
	
}