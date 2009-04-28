<?php
/*

Download xmlrpc-2.2.2 from
http://sourceforge.net/project/downloading.php?group_id=34455&filename=xmlrpc-2.2.2.zip&a=60004708
*/
include("xmlrpc.inc");

$xmlrpc_internalencoding='UTF-8';
	

prepareNews();

function prepareHomeArticle() {
	$num = 20;
	for ($i=0; $i<$num; $i++){
		$content = array(
			'title'=>'测试标题XMLRPC Post '. $i,
			'description'=>$i . ' 测试内容Some content posted using MetaWeblog API',
			'categories'=>array('家園思索'),
		);
		newPost($content);
		echo "Done {$i} \n";
	}
}

function prepareNews() {
	$num = 20;
	for ($i=0; $i<$num; $i++){
		$content = array(
			'title'=>'测试最新消息标题XMLRPC Post '. $i,
			'description'=>$i . ' 测试最新消息内容Some content posted using MetaWeblog API',
			'categories'=>array('最新消息'),
		);
		newPost($content);
		echo "Done {$i} \n";
	}
}


function newPost($content) {
	$host = "localhost";
	$xml_rpc = "/cms/wordpress2_7_1/xmlrpc.php";
	$c = new xmlrpc_client($xml_rpc, $host, 80);
	
	
	$x = new xmlrpcmsg("metaWeblog.newPost",
					array(php_xmlrpc_encode("1"),
						php_xmlrpc_encode("admin"),
						php_xmlrpc_encode("admin"),
						php_xmlrpc_encode($content),
						php_xmlrpc_encode("1")
					)
		);
	
	$c->return_type = 'phpvals';
	$r =$c->send($x);
	if ($r->errno=="0")
	echo "Successfully Posted";
	else {
		echo "There are some error";
		print_r($r);
	}

}


?>