<?php
class ApplicationsController extends AppController {

	var $name = 'Applications';
	var $page_rows = 10;

	function index() {
		$this->Application->recursive = 0;
		$conditions = array();
		if (isset($this->params['url']['pid'])) {
			$conditions['pid'] = $this->params['url']['pid'];
		}
		if (isset($this->params['url']['cid'])) {
			$conditions['cid'] = $this->params['url']['cid'];
		}
		if (isset($this->params['url']['name'])) {
			$conditions['name  LIKE'] = "%". trim($this->params['url']['name']) . "%";
		}
		$this->paginate['Application'] = array(
			'limit' 	=> isset($this->params['url']['rows']) ? $this->params['url']['rows'] : $this->page_rows,
			'page' => isset($this->params['url']['page']) ? $this->params['url']['page'] : 1,
			'order' => 'Application.created DESC',
		);
		$all_data = $this->paginate(null, $conditions);
		$res = Set::extract($all_data,'{n}.Application');
		$this->set('data', array('total'=>$this->params['paging']['Application']['count'],'pageCount'=>$this->params['paging']['Application']['pageCount'],'rows'=>$res));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid application', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('data', $this->Application->read(null, $id));
	}

}
?>