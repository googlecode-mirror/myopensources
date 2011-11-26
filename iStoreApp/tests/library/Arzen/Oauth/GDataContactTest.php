<?php
class Arzen_Oauth_GDataContactTest extends PHPUnit_Framework_TestCase {
	
	function testList() {
		$user = "arzen1013@gmail.com";
		$pass = "my1981";
		
		$service = Zend_Gdata_Gbase::AUTH_SERVICE_NAME;
		
		// Create an authenticated HTTP client
		$client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $service);
		
		// Create an instance of the Base service
		$service = new Zend_Gdata_Gbase($client);
		$query = $service->newItemQuery();
		$query->setBq('[title:Programming]');
		$query->setOrderBy('modification_time');
		$query->setSortOrder('descending');
		$query->setMaxResults('5');
		$feed = $service->getGbaseItemFeed($query);
		echo $feed;				
// 		$client = Zend_Gdata_ClientLogin::getHttpClient($email, $password, 'cp');
// 		$gdata = new Zend_Gdata($client);
// 		$gdata->setMajorProtocolVersion(3);
		
// 		perform query and get result feed
// 		$query = new Zend_Gdata_Query(
// 		        'https://www.google.com/m8/feeds/contacts/default/full');
// 		$query->setMaxResults ( 2000 );
// 		$feed = $gdata->getFeed($query);
// 		echo $feed;
	}
}