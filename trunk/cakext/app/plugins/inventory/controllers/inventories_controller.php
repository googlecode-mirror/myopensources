<?php
class InventoriesController extends InventoryAppController {

	var $name = 'Inventories';

	function index() {
		;
	}


	function getList() {
		$this->autoRender = false;

//		print_r($this->params);
		$result = array();
		$result['totalCount'] = $this->Inventory->find('count');
		$conditions = array(
			'offset' => isset($this->params['form']['start']) ? $this->params['form']['start'] : 0 ,
			'limit' => isset($this->params['form']['limit']) ? $this->params['form']['limit'] : 2 ,
		);
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

	function delete($id = null) {
		$this->autoRender = false;
		if ($id) {
			if ( $this->Inventory->del($id) )
			{
				echo "{success:true,msg:'OK'}";
				exit;

			}

		}
	}
}
?>