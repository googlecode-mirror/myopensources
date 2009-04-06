<?php 
/* SVN FILE: $Id$ */
/* MailTemplate Test cases generated on: 2009-04-05 14:04:18 : 1238943198*/
App::import('Model', 'MailTemplate');

class MailTemplateTestCase extends CakeTestCase {
	var $MailTemplate = null;
	var $fixtures = array('app.mail_template');

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
			'to'  => 'Lorem ipsum dolor sit amet',
			'from'  => 'Lorem ipsum dolor sit amet',
			'from_name'  => 'Lorem ipsum dolor sit amet',
			'title'  => 'Lorem ipsum dolor sit amet',
			'subject'  => 'Lorem ipsum dolor sit amet',
			'content'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'plain_text'  => 1,
			'attachments'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => 'Lorem ipsum dolor sit amet'
			));
		$this->assertEqual($results, $expected);
	}
}
?>