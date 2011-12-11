<?php
class ApplicationsController extends Arzen_Rest_Controller
{

	
	public function indexAction()
	{
		$result = false;
		$model = new Application_Model_DbTable_Applications();
		$res = $model->check($this->_getParam("app_id"), $this->_getParam("app_key"));
		if (isset($res['app_id']) && $res['app_id'] ) {
			$result = true;
		}
		$this->sendResponse(array('state'=>$result));
		
	}
	
	
	
}