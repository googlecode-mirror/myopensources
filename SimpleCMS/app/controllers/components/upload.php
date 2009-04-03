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
    
    var $dest_absolute_file;
    var $dest_web_file;
    var $encrypt_name 	= TRUE;	// if set TRUE the file name is random by unixtime, else keep original name
    var $date_folder 	= TRUE;	// if TRUE folder such as: 2009/0209 , else place in $upload_path
    var $upload_type 	= "";	// set upload file category name
    
    var $image_library 	= "gd2";//gd, gd2, magickwand
    var $maintain_ratio	= TRUE;
	var $rotation_angle		= '90';
	var $x_axis				= '20';
	var	$y_axis				= '10';
    
	// Watermark Vars
	var $wm_text			= '';			// Watermark text if graphic is not used
	var $wm_type			= 'text';		// Type of watermarking.  Options:  text/overlay
	var $wm_x_transp		= 4;
	var $wm_y_transp		= 4;
	var $wm_overlay_path	= '';			// Watermark image path
	var $wm_font_path		= '';			// TT font
	var $wm_font_size		= 17;			// Font size (different versions of GD will either use points or pixels)
	var $wm_vrt_alignment	= 'B';			// Vertical alignment:   T M B
	var $wm_hor_alignment	= 'C';			// Horizontal alignment: L R C
	var $wm_padding			= 0;			// Padding around text
	var $wm_hor_offset		= 0;			// Lets you push text to the right
	var $wm_vrt_offset		= 0;			 // Lets you push  text down
	var $wm_font_color		= '#ffffff';	// Text color
	var $wm_shadow_color	= '';			// Dropshadow color
	var $wm_shadow_distance	= 2;			// Dropshadow distance
	var $wm_opacity			= 50; 			// Image opacity: 1 - 100  Only works with image
	
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
        $this->file = $this->controller->data[$model][$filename];
        
        // populate file absolute/web path
        $file_name = $this->_getFileName();
        $folder_path = $this->_getFilePath();
		$this->dest_absolute_file = $folder_path['real_path'] . $file_name;
		$this->dest_web_file = $folder_path['web_path'] . $file_name;
		
		$operate = strtolower($this->operate);
		if (($operate != 'none') ) {
			
			$function_name = sprintf("_%s", $operate);
			if ( method_exists($this, $function_name) ) {
				$this->$function_name();
			}
			
		}
		else 
			$this->_copy();
        
        
        $this->controller->data[$model][$filename] = $this->dest_web_file;
		return $this->dest_absolute_file;
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
	
	/**
	 * Get upload file web show path
	 *
	 * @author	John Meng 2009-2-10
	 * @access	public
	 * @param	void
	 * @return	string
	 */
	function getFileWebPath() {
		
		if ( empty($this->dest_web_file) ) {
			
	        return FALSE;
			
		}
		return $this->dest_web_file;
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
		if ( copy($this->file['tmp_name'], $this->dest_absolute_file) ) {
			return TRUE;
		}
		return FALSE;
	}
	
	function _resize() {
		$config = array();
		$config['image_library'] = $this->image_library;
		$config['source_image'] = $this->file['tmp_name'];
		$config['new_image'] = $this->dest_absolute_file;
		
		$config['maintain_ratio'] = $this->maintain_ratio;
		$config['width'] = $this->width;
		$config['height'] = $this->height;
		
		$img_lib = new Image_Lib($config);
		$img_lib->resize();
		
	}
	
	function _crop() {
		$config = array();
		$config['image_library'] = $this->image_library;
		$config['source_image'] = $this->file['tmp_name'];
		$config['new_image'] = $this->dest_absolute_file;
		
		$config['maintain_ratio'] = FALSE;
		$config['width'] = $this->width;
		$config['height'] = $this->height;
		$config['x_axis'] = $this->x_axis;
		$config['y_axis'] = $this->y_axis;
		
		$img_lib = new Image_Lib($config);
		$img_lib->crop();
		
	}

	function _rotate() {
		$config = array();
		$config['image_library'] = $this->image_library;
		$config['source_image'] = $this->file['tmp_name'];
		$config['new_image'] = $this->dest_absolute_file;
		
		$config['rotation_angle'] = $this->rotation_angle;
		
		$img_lib = new Image_Lib($config);
		$img_lib->rotate();
		
	}
	
	function _watermark() {
		$config = array();
		$config['image_library']	= $this->image_library;
		$config['source_image']		= $this->file['tmp_name'];
		$config['new_image'] 		= $this->dest_absolute_file;
		
		$config['wm_text'] 			= $this->wm_text;
		$config['wm_type'] 			= $this->wm_type;
		$config['wm_x_transp'] 		= $this->wm_x_transp;
		$config['wm_y_transp'] 		= $this->wm_y_transp;
		$config['wm_overlay_path'] 	= $this->wm_overlay_path;	
		$config['wm_font_path'] 	= $this->wm_font_path;
		$config['wm_font_size'] 	= $this->wm_font_size;
		$config['wm_vrt_alignment'] = $this->wm_vrt_alignment;	
		$config['wm_hor_alignment'] = $this->wm_hor_alignment;	
		$config['wm_padding'] 		= $this->wm_padding;
		$config['wm_hor_offset'] 	= $this->wm_hor_offset;
		$config['wm_vrt_offset'] 	= $this->wm_vrt_offset;
		$config['wm_font_color'] 	= $this->wm_font_color;
		$config['wm_shadow_color'] 	= $this->wm_shadow_color;	
		$config['wm_shadow_distance'] = $this->wm_shadow_distance;	
		$config['wm_opacity'] 		= $this->wm_opacity;
		
		
		$img_lib = new Image_Lib($config);
		$img_lib->watermark();
		
	}
	
    function addError($msg){
        $this->errors[] = $msg;
    } 		
}
