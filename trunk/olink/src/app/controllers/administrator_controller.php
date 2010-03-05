<?php
class AdministratorController extends AppController {

	var $name = 'Administrator';

	function index() {
		$administrators = $this->Administrator->getAll();
		$this->breakcrumb = array(
			'nav' => array(
				array('text'=>__("Administrator", true) ),

			),
		);
		$this->set('administrators', $administrators );
	}

}
?>