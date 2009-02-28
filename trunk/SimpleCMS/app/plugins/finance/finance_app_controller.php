<?php
/**
 *
 * Personal finance plugin
 * 
 * @package    Plugin
 * @subpackage Finance
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-2-21
 * @version 1.0.0 $id$
 */
class FinanceAppController extends AppController {
	
	var $active_options = null;
	
	function beforeRender() {
		if (!empty($this->breakcrumb) ) {
			$this->set("breakcrumb", $this->breakcrumb);
		}
		// populate active options
		Configure::load("common");
		$this->active_options = Configure::read('active_options');
		$this->set("active_options", $this->active_options);
	}
	
}

?>