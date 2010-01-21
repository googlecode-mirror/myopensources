<?php 
/* SVN FILE: $Id$ */
/* MailTemplate Test cases generated on: 2009-04-03 15:04:00 : 1238745300*/
App::import('Model', 'Webmailler.MailTemplate');

class MailTemplateTestCase extends CakeTestCase {
	var $MailTemplate = null;
	var $fixtures = array('plugin.webmailler.mail_template');

	function startTest() {
		$this->MailTemplate =& ClassRegistry::init('MailTemplate');
	}

	function testMailTemplateInstance() {
		$this->assertTrue(is_a($this->MailTemplate, 'MailTemplate'));
	}

	function testMailTemplateFind() {
		$this->MailTemplate->recursive = -1;
		$results = $this->MailTemplate->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('MailTemplate' => array(
			'id'  => 1,
			'title'  => 'Lorem ipsum dolor sit amet',
			'subject'  => 'Lorem ipsum dolor sit amet',
			'content'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'plain_text'  => 1,
			'created'  => 'Lorem ipsum dolor sit amet'
			));
		$this->assertEqual($results, $expected);
	}
}
?>