<?php
class SuggestController extends Arzen_Rest_Controller
{

	public function indexAction() {
		$data = array("http://www.oggle.com", array("content"=>"ddd"));
		$this->sendResponse($data);
	}
	
	public function postAction() {
		$contents = $this->_getParam("contents");
		file_put_contents("d:/test.txt", $contents);
	}	
	
}