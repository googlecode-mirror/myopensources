<?php
App::import("Vendor", "Image_Lib", array('file' => 'Image'.DS.'Lib.php') );

/**
 *
 * Image handle component , resize, crop rotate etc.
 *
 * @package    App
 * @subpackage Component
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-2-6
 * @version 1.0.0 $id$
 */
class UploadComponent extends Object {
	
    /**
     * File system location to save thumbnail to.  ** Must be writable by webserver 
     */
    var $upload_path = 'uploads';
    
    /**
     * Array of errors
     */
    var $errors = array();
    
    /**
     * Default width if not set
     */
    var $width = 100;
    
    /**
     * Default height if not set
     */
    var $height = 100;
    
    /**
     * what operate do you want to do for upload file?
     */
    var $operate = 'none';//[none, resize, crop]
    
    /**
     * The original image uploaded
     * @access private
     */
    var $file;
    
    var $dest_file;
    var $encrypt_name 	= TRUE;	// if set TRUE the file name is random by unixtime, else keep original name
    var $date_folder 	= TRUE;	// if TRUE folder such as: 2009/0209 , else place in $upload_path
    var $upload_type 	= "";	// set upload file category name
    
    var $image_library 	= "gd2";//gd, gd2, magickwand
    var $maintain_ratio	= TRUE;
      
	var $controller;
	var $model; 
	
	
	function initialize($controller, $config=array()) {
		$this->controller = $controller;
		if ( count($config) > 0 ) {
			foreach ($config as $key=>$value) {
				$this->$key = $value;
			}
		}
	}
	
	function upload($filename, $model) {
        // Make sure we have the name of the uploaded file and that the Model is specified
        if(empty($filename) || !$this->controller->data[$model][$filename]){
            $this->addError('non-existant file'.$filename);
            return false;
        }
        // save the file to the object
        $this->file = &$this->controller->data[$model][$filename];
        
        
        // Load phpThumb
        $file_name = $this->_getFileName();
        $folder_path = $this->_getFilePath();
        $this->dest_file = $real_file_path = $folder_path['real_path'] . $file_name;
        $web_file_path = $folder_path['web_path'] . $file_name;
        
        switch ( strtolower($this->operate) ) {
        	case 'resize':
        		$this->_resize();
        	break;
        	
        	case 'none':
        	default:
        		$this->_copy();
        		break;
        }
        
        
        $this->file = $web_file_path;
		
	}
	
	/**
	 * Populate file path
	 *
	 * @author	John Meng 2009-2-9
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function _getFilePath() {
		
        // verify that the filesystem is writable, if not add an error to the object
        // dont fail if not and let phpThumb try anyway
        $real_path 	= WWW_ROOT . IMAGES_URL . $this->upload_path;
		$web_path	= $this->upload_path;
		$web_splitor = "/";
		$this->_createFolder($real_path);
		
		if ($this->upload_type) {
			$real_path .= DS . $this->upload_type;
			$web_path .= $web_splitor . $this->upload_type;
			$this->_createFolder($real_path);
		}
		
		if ($this->date_folder) {
			// create year folder
			$year_folder = date("Y");
			$real_path .= DS . $year_folder;
			$web_path .= $web_splitor . $year_folder;
			$this->_createFolder($real_path);
			
			// create date folder
			$date_folder = date("md");
			$real_path .= DS . $date_folder;
			$web_path .= $web_splitor . $date_folder;
			$this->_createFolder($real_path);
			
		}
        
		return array(
			'real_path' => $real_path . DS,
			'web_path' => $web_path . $web_splitor,
		);
	}
	
	function _createFolder($path) {
        if (!file_exists($path) ) {
			$new_folder_mode = 0755;
        	mkdir($path, $new_folder_mode);
        }
	}
	
	/**
	 * Populate new file name
	 *
	 * @author	John Meng 2009-2-9
	 * @access	private
	 * @param	void
	 * @return	string
	 */
	function _getFileName() {
		if ( $this->encrypt_name ) {
			$file_ext = $this->_getExtension($this->file['name']);
			mt_srand();
			return md5(uniqid(mt_rand())).$file_ext;
		}
		else {
			return $this->file['name'];
		}
	}
	
    /**
	 * Extract the file extension
	 *
	 * @access	protected
	 * @param	string
	 * @return	string
	 */
	function _getExtension($filename)
	{
		$x = explode('.', $filename);
		return '.'.end($x);
	}
	
	
	function _copy() {
		if ( move_uploaded_file($this->file['tmp_name'], $this->dest_file) ) {
			return TRUE;
		}
		return FALSE;
	}
	
	function _resize() {
		$config = array();
		$config['image_library'] = $this->image_library;
		$config['source_image'] = $this->file['tmp_name'];
		$config['new_image'] = $this->dest_file;
		
		$config['maintain_ratio'] = $this->maintain_ratio;
		$config['width'] = $this->width;
		$config['height'] = $this->height;
		
		$img_lib = new Image_Lib($config);
		$img_lib->resize();
		
	}
	
	
    function addError($msg){
        $this->errors[] = $msg;
    } 		
}
