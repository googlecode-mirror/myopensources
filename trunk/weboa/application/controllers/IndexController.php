<?php

class IndexController extends Zend_Controller_Action
{

	public function init()
	{
		/* Initialize action controller here */
	}

	public function indexAction()
	{
		// action body
		$form1 = new Zend_Dojo_Form();
		$form1->setMethod('post')->setAction("/");
		$form1->addElement('DateTextBox', 'date1', array(
        'label' => 'Choose a date:',
        'datePattern' => 'yyyy-MM-dd',
        'validators' => array('Date'),
        'required' => true
		))
		->addElement('TimeTextBox', 'time1', array(
        'label' => 'Choose a time:',
        'timePattern' => 'HH:mm:ss',
		))
		->addElement('NumberSpinner', 'number1', array(
        'label' => 'Choose a number:',
        'value' => 0,
        'smallDelta' => 1,
        'min' => 0,
        'max' => 30,
        'defaultTimeout' => 100,
        'timeoutChangeRate' => 100,
		))
		->addElement('HorizontalSlider', 'slide1', array(
        'label' => 'Let\'s slide:',
        'minimum' => 0,
        'maximum' => 25,
        'discreteValues' => 10,
        'style' => 'width: 450px;',
        'topDecorationDijit' => 'HorizontalRuleLabels',
        'topDecorationLabels' => array('0%', '50%', '100%'),
        'topDecorationParams' => array('style' => 'padding-bottom: 20px;'),
		))
		->addElement('SubmitButton', 'submit', array(
        'label' => 'Submit!'
        ));

        $this->view->form1 = $form1;

	}


}

