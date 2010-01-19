<?php
if (!defined("SET_PHPEXCEL")) {
	define("SET_PHPEXCEL", TRUE);
	set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__) );
	
}
require_once 'PHPExcel.php';

/**
 *
 * File Desription
 * 
 * @package    Core
 * @subpackage Core
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-3-21
 * @version 1.0.0 $id$
 */
class PHPExcel_Handler {
	private $objExcel;
	private $processer;
	
	function __construct($mode="", $engine="") {
		if ($mode && $engine) {
			$this->setProcesser($mode, $engine);
		}
		
	}
	
	function getExcel() {
		return $this->objExcel;
	}
	
	function setProcesser($mode, $engine) {
		$mode = ucfirst( strtolower($mode) );
		$engine = ucfirst( strtolower($engine) );
		
		$file = sprintf("PHPExcel/%s/%s.php", $mode,  $engine );
		$class = sprintf("PHPExcel_%s_%s", $mode,  $engine );
		try {
			require_once "{$file}";
			if ($mode == "Writer") {
				$this->objExcel = new PHPExcel();
				$this->processer = new $class($this->objExcel);
			}else {
				$this->processer = new $class();
			}
			
			
		}catch (Exception $e){
			throw $e->getMessage();
		}
	}
	
	function getProcesser() {
		return $this->processer;
	}
	
	
	
	function saveFile($outputFileName) {
		$this->processer->save($outputFileName);
	}
	
	function saveOutput($outputFileName="") {
		header("Content-Type: application/force-download");  
		header("Content-Type: application/octet-stream");  
		header("Content-Type: application/download");  
		header('Content-Disposition:inline;filename="'.$outputFileName.'"');  
		header("Content-Transfer-Encoding: binary");  
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");  
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");  
		header("Pragma: no-cache");  
		$this->processer->save('php://output'); 		
	}
	
}
