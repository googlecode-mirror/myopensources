<?php
class InventoriesController extends InventoryAppController {

	var $name = 'Inventories';

	function index() {
		;
	}


	function getList() {
		$this->autoRender = false;

		$result = array();
		$result['totalCount'] = $this->Inventory->find('count');
		$conditions = array(
			'offset' => isset($this->params['form']['start']) ? $this->params['form']['start'] : 0 ,
			'limit' => isset($this->params['form']['limit']) ? $this->params['form']['limit'] : 3 ,
			'order' => 'id DESC'
		);
		if (isset($this->params['form']['query']) && $this->params['form']['query']) {
			$q = $this->params['form']['query'];
			$conditions['conditions'] = array('name LIKE'=>"%{$q}%");
		}

		$all_data = $this->Inventory->find('all', $conditions);
		$result['topics'] = Set::extract($all_data, '{n}.Inventory');
		echo json_encode($result);
	}


	function add() {
		if (!empty($this->data)) {
			$this->autoRender = false;
			$this->Inventory->create();
			if ($this->Inventory->save($this->data)) {
				echo "{success:true,msg:'OK'}";
				exit;
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Article', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Inventory->save($this->data)) {
				$this->ajaxSuccess();
			} else {
				$this->ajaxFail();
			}
		}
		if (empty($this->data)) {
			$this->set('inventory', $this->Inventory->read(null, $id));
			$this->set('act', "edit");
			$this->render("add");
		}
	}

	function delete($id = null) {
		$this->autoRender = false;
		if ($id) {
			if ( $this->Inventory->del($id) )
			{
				$this->ajaxSuccess();

			}

		}
	}
}
?>