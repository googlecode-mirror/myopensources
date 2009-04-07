<?php
App::import("Vendor", "File_Common", array('file' => 'File'.DS.'Common.php') );
App::import("Vendor", "Image_Lib", array('file' => 'Image'.DS.'Lib.php') );

/**
 *
 * Thumbnail helper
 * Depend on vendors/File/Common.php
 * 
 * @package    App
 * @subpackage Helper
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-2-10
 * @version 1.0.0 $id$
 */
class ThumbnailHelper extends AppHelper {
	
	var $helpers = array('Html');
	
    /**
     * File system location to save thumbnail to.  ** Must be writable by webserver 
     */
    var $upload_path = 'thumbs';
    var $dest_absolute_file;
    var $dest_web_file;
    
	var $image_library 	= "gd2";//gd, gd2, magickwand
    var $maintain_ratio	= TRUE;
    var $image_file_md5;
    var $width 			= "";
    var $height 		= "";
    
    /**
     * Resize specify image file and cache in local file system
     * and then render by Html->image
     *
     * @author	John Meng 2009-2-12
     * @access	public
     * @param	string		$image		specify image path
     * @param 	array		$params		resize operate option
     * @param	array		$option		$htmlAttributes Array of HTML attributes
     * @return	string		HTML render string
     */
    function show($image, $params=array(), $option=array() ) {
    	return $this->Html->image($this->thumb( $image, $params), $option);
    }
    
    /**
     * Resize specify image file and cache in local file system
     *
     * @author	John Meng 2009-2-12
     * @access	public
     * @param	string		$image		specify image path
     * @param 	array		$params		resize operate option
     * @return	string		return after resize file web path
     */
	function thumb( $image, $params=array() ) {
		$this->_initialize($params);
		
		if ( empty($this->width) && empty($this->height) ) {
			return $image;
		}
		
		//check cache the image TRUE or FALSE
		$this->image_file_md5 = $this->_getFilePathMD5($image);
		$file_name = $this->_getCacheFileName($image);
        $folder_path = $this->_getFilePath();
		$this->dest_absolute_file = $folder_path['real_path'] . $file_name;
		$this->dest_web_file = $folder_path['web_path'] . $file_name;
		
		if ( !file_exists($this->dest_absolute_file) ) {
			$config = array();
			$config['image_library'] = $this->image_library;
			$config['new_image'] = $this->dest_absolute_file;
			
			$config['maintain_ratio'] = $this->maintain_ratio;
			$config['width'] = $this->width;
			$config['height'] = $this->height;
			
			$pattern = "^http://";
			if ( eregi($pattern, $image) ) {
				// remote image
				$web_tmp_path = $folder_path['real_path'] . "tmp_". $file_name;
				$this->_cacheWebFile($image, $web_tmp_path);
				$config['source_image'] = $web_tmp_path;
				$img_lib = new Image_Lib($config);
				$img_lib->resize();
				@unlink($web_tmp_path);
			}
			else {
				// localhost image
				$config['source_image'] = WWW_ROOT . IMAGES_URL . $image;
				$img_lib = new Image_Lib($config);
				$img_lib->resize();
				
			}
			
		}
		return $this->dest_web_file;
		
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
	
	/**
	 * Cache remote file to local file system
	 *
	 * @author	John Meng 2009-2-12
	 * @access	private
	 * @param	string		$url			remote image file url
	 * @param 	string		$tmp_path		local tmp file
	 * @return	void
	 */
	function _cacheWebFile($url, $tmp_path) {
		$t_fp = fopen($tmp_path, 'wb') or die('Unable to open file '.$tmp_path.' for writing');
		$fp = fopen($url, 'rb') or die('Unable to open file '.$url.' for reading');
		while(!feof($fp))
		{
		    fwrite($t_fp, fgets($fp, 4096) );
		}
		fclose($fp);
		fclose($t_fp);
		
	}
	
	/**
	 * Get upload file absolute path
	 *
	 * @author	John Meng 2009-2-10
	 * @access	public
	 * @param	void
	 * @return	string
	 */
	function getFileAbsolutePath() {
		if ( empty($this->dest_absolute_file) ) {
	        return FALSE;
		}
        return $this->dest_absolute_file;
	
	}
	
	function _getFilePath() {
        $real_path 	= WWW_ROOT . IMAGES_URL . $this->upload_path;
		$web_path	= $this->upload_path;
		$web_splitor = "/";
		File_Common::createFolder($real_path);
		
		if ($this->image_file_md5) {
			$real_path .= DS . $this->image_file_md5;
			$web_path .= $web_splitor . $this->image_file_md5;
			File_Common::createFolder($real_path);
		}
		
		return array(
			'real_path' => $real_path . DS,
			'web_path' => $web_path . $web_splitor,
		);
		
	}
	
	
	function _getCacheFileName($image) {
		$ext = File_Common::getExtension($image);
		return sprintf("w%s_h%s_%s%s", $this->width, $this->height, $this->image_file_md5, $ext);
	}
	
	
	function _getFilePathMD5($file_path) {
		return md5($file_path);
	}
		
}