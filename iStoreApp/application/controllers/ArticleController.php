<?php
class ArticleController extends Zend_Controller_Action
{

	public function init()
	{
		$this->_helper->viewRenderer->setNoRender(true);
	}
	
	protected function getJsonBody($body) {
		return Zend_Json::encode($body);
	}
	
	public function indexAction()
	{
		$data = array("result"=>"From indexAction() returning all articles");
		$this->getResponse()
		->appendBody($this->getJsonBody($data));
	}

	public function getAction()
	{
		$this->getResponse()
		->appendBody("From getAction() returning the requested article");

	}

	public function postAction()
	{
		$this->getResponse()
		->appendBody("From postAction() creating the requested article");

	}

	public function putAction()
	{
		$this->getResponse()
		->appendBody("From putAction() updating the requested article");

	}

	public function deleteAction()
	{
		$this->getResponse()
		->appendBody("From deleteAction() deleting the requested article");

	}

}