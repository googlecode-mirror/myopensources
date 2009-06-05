<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	protected function _initView()
	{
		// Initialize view
		$view = new Zend_View();
		$view->doctype('XHTML1_STRICT');
		$view->headTitle('My First Zend Framework Application');
		
		// Add it to the ViewRenderer
		$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper(
		            'ViewRenderer'
		            );
        $view->addHelperPath('Zend/Dojo/View/Helper/', 'Zend_Dojo_View_Helper');

        $viewRenderer->setView($view);
        Zend_Dojo::enableView($view);
        // Return it, so that it can be stored by the bootstrap
        return $view;
	}

}

