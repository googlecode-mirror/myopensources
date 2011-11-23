<?php
class ArticleController extends Arzen_Rest_Controller
{

	
	public function indexAction()
	{
		$data = array("result"=>"From indexAction() returning all articles");
		$this->sendResponse($data);
		
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