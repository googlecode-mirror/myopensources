<?php
/**
 *
 * Image handle component , resize, crop rotate etc.
 *
 * @package    App
 * @subpackage Component
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-2-6
 * @version 1.0.0 $id$
 */
class ImageLibComponent extends Object {
	
    /**
     * The mime types that are allowed for images
     */
    var $allowed_mime_types = array('image/jpeg','image/pjpeg','image/gif','image/png');
    
    /**
     * File system location to save thumbnail to.  ** Must be writable by webserver 
     */
    var $image_location = 'uploads';
    
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
     * do we zoom crop the image?
     */
    var $zoom_crop = 0;//do not zoom crop
    
    /**
     * The original image uploaded
     * @access private
     */
    var $file;
      
	var $controller;
	var $model; 
	
	function startup($controller) {
		$this->controller = $controller;
	}
	
	function resize($filename, $model) {
		
        // Make sure we have the name of the uploaded file and that the Model is specified
        if(empty($filename) || !$this->controller->data[$model][$filename]){
            $this->addError('non-existant file'.$filename);
            return false;
        }
        // save the file to the object
        $this->file = $this->controller->data[$model][$filename];
        
        // verify that the size is greater than 0 ( emtpy file uploaded )
        if(!$this->file['size']){
            $this->addError('File Size is 0');
            return false;
        }
        
        // verify that our file is one of the valid mime types
        if(!in_array($this->file['type'],$this->allowed_mime_types)){
            $this->addError('Invalid File type: '.$this->file['type']);
            return false;
        }
        // verify that the filesystem is writable, if not add an error to the object
        // dont fail if not and let phpThumb try anyway
        $upload_dir = WWW_ROOT.DS.$this->image_location;
        
        if (!file_exists($upload_dir) ) {
        	mkdir($upload_dir, 0755);
        }
        
        if(!is_writable($upload_dir)){
            $this->addError('directory: '.$upload_dir.' is not writable.');
        }
        
        // Load phpThumb
        App::import("Vendor", "Image_Lib", array('file' => 'Image'.DS.'Lib.php') );
        
        
		$config = array();
		$config['image_library'] = 'magickwand';
		$config['source_image'] = $this->file['tmp_name'];
		$config['new_image'] = '/tmp/testing.png';
		
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = $this->width;
		$config['height'] = $this->height;
		
        debug($config);
        
		$img_lib = new Image_Lib($config);
		$img_lib->resize();
        
        
//        vendor('phpThumb'.DS.'phpthumb.class');
//        $phpThumb = new phpThumb();
//        $phpThumb->setSourceFilename($this->file['tmp_name']);
//        $phpThumb->setParameter('w',$this->width);
//        $phpThumb->setParameter('h',$this->height);
//        $phpThumb->setParameter('zc',$this->zoom_crop);
//        if($phpThumb->generateThumbnail()){
//            if(!$phpThumb->RenderToFile(WWW_ROOT.DS.$this->image_location.DS.$this->file['name'])){
//                $this->addError('Could not render file to: '.$this->image_location.DS.$this->file['name']);
//            }
//        } else {
//            $this->addError('could not generate thumbnail');
//        }
//        
//        // if we have any errors, remove any thumbnail that was generated and return false
//        if(count($this->errors)>0){
//            if(file_exists(WWW_ROOT.DS.$this->image_location.DS.$this->file['name'])){
//                unlink(WWW_ROOT.DS.$this->image_location.DS.$this->file['name']);
//            }
//            return false;
//        } else return true;
		
	}
	
    function addError($msg){
        $this->errors[] = $msg;
    } 		
}
