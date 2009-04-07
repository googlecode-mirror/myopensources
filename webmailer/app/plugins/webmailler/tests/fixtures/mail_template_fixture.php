<?php 
/* SVN FILE: $Id$ */
/* MailTemplate Fixture generated on: 2009-04-03 15:04:00 : 1238745300*/

class MailTemplateFixture extends CakeTestFixture {
	var $name = 'MailTemplate';
	var $table = 'mail_templates';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'title' => array('type'=>'string', 'null' => false, 'length' => 120, 'key' => 'primary'),
			'subject' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 120),
			'content' => array('type'=>'text', 'null' => true, 'default' => NULL),
			'plain_text' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 1),
			'created' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 45),
			'indexes' => array('PRIMARY' => array('column' => array('id', 'title'), 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'title'  => 'Lorem ipsum dolor sit amet',
			'subject'  => 'Lorem ipsum dolor sit amet',
			'content'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'plain_text'  => 1,
			'created'  => 'Lorem ipsum dolor sit amet'
			));
}
?>