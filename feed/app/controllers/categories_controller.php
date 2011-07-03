<?php
class CategoriesController extends AppController {

	var $name = 'Categories';

	function index() {
		$this->Category->recursive = 0;
		$pid = 1;
		if (isset($this->params['url']['pid'])) {
			$pid = $this->params['url']['pid'];
		}
		$condistions = array(
			'fields' => array('Category.id', 'Category.name'),
			'conditions' => array('Category.pid' => $pid),
		);
		$this->set('data', $this->Category->find('list', $condistions) );
	}

}
?>