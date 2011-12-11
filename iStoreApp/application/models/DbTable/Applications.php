<?php

class Application_Model_DbTable_Applications extends Zend_Db_Table_Abstract
{

    protected $_name = 'applications';

    public function check($app_id, $app_key)
    {
    	$selects = $this->select()
    				->where("app_id=?", $app_id)
    				->where("app_key=?", $app_key);
    	return $this->fetchRow($selects);
    }
    
    public function add($data) {
    	$data['created'] = time();
    	$data['updated'] = time();
    	$this->insert($data);
    }
}

