<?php
/*

Download xmlrpc-2.2.2 from
http://sourceforge.net/project/downloading.php?group_id=34455&filename=xmlrpc-2.2.2.zip&a=60004708
*/
include("xmlrpc.inc");
$host = "localhost";
$xml_rpc = "/cms/wordpress2_7_1/xmlrpc.php";
$c = new xmlrpc_client($xml_rpc, $host, 80);

$content['title']="家園思索XMLRPC Post";
$content['description']="Some content posted using MetaWeblog API";
$content['categories'] = array('家園思索');
$x = new xmlrpcmsg("metaWeblog.newPost",
array(php_xmlrpc_encode("1"),
php_xmlrpc_encode("admin"),
php_xmlrpc_encode("admin"),
php_xmlrpc_encode($content),
php_xmlrpc_encode("1")));

$c->accepted_charset_encodings = array('UTF-8');
$c->request_charset_encoding = 'UTF-8';
$c->return_type = 'phpvals';
$r =$c->send($x);
if ($r->errno=="0")
echo "Successfully Posted";
else {
	echo "There are some error";
	print_r($r);
	echo mb_convert_encoding($r->errstr, 'gb2312', 'utf8');
}

?>