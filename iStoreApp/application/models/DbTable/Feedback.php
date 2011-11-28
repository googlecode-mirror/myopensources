<?php

class Application_Model_DbTable_Feedback extends Zend_Db_Table_Abstract
{

    protected $_name = 'feedback';

    public function addFeedback($contents)
    {
    	$data = array(
		    'content' => $contents,
    	);
    	$this->insert($data);
    }
}

