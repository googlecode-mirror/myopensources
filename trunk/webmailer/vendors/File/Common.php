<?php
/**
 *
 * File description
 *
 * @package    Vendor
 * @subpackage File
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-2-12
 * @version 1.0.0 $id$
 */

class File_Common {
	
    /**
	 * Extract the file extension
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function getExtension($filename)
	{
		$x = explode('.', $filename);
		return '.'.end($x);
	}
	
	/**
	 * If the folder not exsit, then create it , else skip
	 *
	 * @author	John Meng 2009-2-12
	 * @access	public
	 * @param	string	$path
	 * @param 	string	$new_folder_mode
	 * @return	void
	 */
	function createFolder($path, $new_folder_mode=0755 ) {
        if (!file_exists($path) ) {
        	mkdir($path, $new_folder_mode);
        }
	}
	
}
