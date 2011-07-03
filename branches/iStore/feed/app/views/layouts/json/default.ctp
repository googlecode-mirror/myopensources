<?php
//header("Pragma: no-cache");
//header("Cache-Control: no-store, no-cache, max-age=0, must-revalidate");
//header('Content-Type: text/x-json');
//header("X-JSON: ".$content_for_layout);
echo generate_jsonp($content_for_layout);
//echo $content_for_layout;

function generate_jsonp($data) {
	if (isset($_GET['callback'])) {
	  if (preg_match('/\W/', $_GET['callback'])) {
	    // if $_GET['callback'] contains a non-word character,
	    // this could be an XSS attack.
	    header('HTTP/1.1 400 Bad Request');
	    exit();
	  }
	  header('Content-type: application/javascript; charset=utf-8');
	  print sprintf('%s(%s);', $_GET['callback'], $data);
	}else{
		print $data;
	}
}