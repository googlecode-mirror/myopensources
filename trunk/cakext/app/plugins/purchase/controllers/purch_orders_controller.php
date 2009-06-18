<?php
class PurchOrdersController extends PurchaseAppController {

	var $name = 'PurchOrders';
	var $helpers = array('Extgrid');

	function index() {
		;
	}

	function getList() {
		$this->autoRender = false;

		$result = array();
		$countConditions = array();
		$conditions = array(
			'offset' => isset($this->params['form']['start']) ? $this->params['form']['start'] : 0 ,
			'limit' => isset($this->params['form']['limit']) ? $this->params['form']['limit'] : 3 ,
			'order' => 'id DESC'
		);
		if (isset($this->params['form']['query']) && $this->params['form']['query']) {
			$q = $this->params['form']['query'];
			$countConditions['conditions'] = $conditions['conditions'] = array('name LIKE'=>"%{$q}%");
		}
		$result['totalCount'] = $this->PurchOrder->find('count', $countConditions);

		$all_data = $this->PurchOrder->find('all', $conditions);
		$result['topics'] = Set::extract($all_data, '{n}.PurchOrder');
		echo json_encode($result);
	}

	function add() {
		if (!empty($this->data)) {
			$this->autoRender = false;
			$this->PurchOrder->create();
			if ($this->PurchOrder->save($this->data)) {
				echo "{success:true,msg:'OK'}";
				exit;
			}
		}
	}

}
?>