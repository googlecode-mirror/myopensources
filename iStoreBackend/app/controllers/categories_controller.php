<?php
class CategoriesController extends AppController {

	var $name = 'Categories';
	
	function index() {
		;
	}
	
	function listing() {
		$this->Category->recursive = 0;
		$conditions = array();
		if (isset($this->params['form']['name'])) {
			$conditions['name  LIKE'] = $this->params['form']['name'] . "%";
		}
		$this->paginate['Category'] = array(
			'limit' 	=> isset($this->params['form']['rows']) ? $this->params['form']['rows'] : $this->page_rows,
			'page' => isset($this->params['form']['page']) ? $this->params['form']['page'] : 1,
			'order' => 'Category.created DESC',
		);
		$all_data = $this->paginate(null, $conditions);
		$res = Set::extract($all_data,'{n}.Category');
		$this->printJson(array('total'=>$this->params['paging']['Category']['count'],'rows'=>$res));
	}
	
}
?>