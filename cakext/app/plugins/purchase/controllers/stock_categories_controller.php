<?php
class StockCategoriesController extends PurchaseAppController {

	var $name = 'StockCategories';
	var $helpers = array('Html', 'Form');

	function getCategories() {
		$this->autoRender = false;

		$conditions = array(
			'fields' => array('id', 'description'),
			'order' => 'id DESC',
		);
		$all_data = $this->StockCategory->find('all', $conditions);
		$result = array();
		$result['topics'] = Set::extract($all_data, '{n}.StockCategory');
		echo json_encode($result);

	}

}
?>