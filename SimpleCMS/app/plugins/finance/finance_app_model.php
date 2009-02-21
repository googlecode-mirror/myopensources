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
class FinanceAppModel extends AppModel {
	
	function delIds($id_data) {
		if (empty($id_data)) {
			return false;
		}
		$ids = implode(",", $id_data);
		$sql = "DELETE FROM ".$this->table." WHERE id IN ({$ids})";
		$this->query($sql);
		return true;
	}
	
}

?>