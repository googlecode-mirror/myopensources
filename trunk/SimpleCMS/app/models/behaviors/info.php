<?php
App::import("Vendor", "Environment_Client", array('file' => 'Environment'.DS.'Client.php') );

/**
 *
 * Auto appen operatener ip and user id to database beforce insert
 * 
 * @package    App
 * @subpackage Behavior
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-2-21
 * @version 1.0.0 $id$
 */
class InfoBehavior extends ModelBehavior {
	
	var $_model;
	
	function setup(&$model, $config = array()) {
		$this->_model 	= &$model;
	}
	
	function beforeSave(&$model) {
		$model_name = (string) $model->name;
		$data = &$model->data[$model_name];
		$data['add_ip'] = Environment_Client::getClientIP();
		$data['user_id'] = $model->AuthUser['User']['id'];
	}
	
}
