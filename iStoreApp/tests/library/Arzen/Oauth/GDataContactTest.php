<?php
class Arzen_Oauth_GDataContactTest extends PHPUnit_Framework_TestCase {
	
	function testList() {
		$email = "";
		$password = "";
		$client = Zend_Gdata_ClientLogin::getHttpClient($email, $password, 'cp');
		$gdata = new Zend_Gdata($client);
		$gdata->setMajorProtocolVersion(3);
		
		// perform query and get result feed
		$query = new Zend_Gdata_Query(
		        'https://www.google.com/m8/feeds/contacts/default/full');
		$feed = $gdata->getFeed($query);
		echo $feed;
	}
}