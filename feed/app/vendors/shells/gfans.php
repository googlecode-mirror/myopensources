<?php
class GfansShell extends Shell {
	
	var $url = "http://apk.gfan.com/Aspx/UserApp/softpotal.aspx?i=2&softCategory=27###";//实用工具
	var $tmp_file = "/tmp.txt";
	var $prefix_domain = "http://apk.gfan.com/Aspx/UserApp/";
	
	function main() {
		$this->out('----------------------------------------' . "\n");	
		$this->out('-------- Start grap gfans.com ----------' . "\n");	
		$this->out('----------------------------------------' . "\n");	
		$this->getListURL();
	}
	
	function getListURL() {
		$content = $this->getUrlData(dirname(__FILE__).$this->tmp_file);
		$pattern = "/<a href=\"([^\"]*)\" target=\"_blank\" class=\"title\">([^\<]*)<span class=\"version\">/";
		$matchs = null;
		preg_match_all($pattern, $content, $matchs);
		$list_data=array();
		if ($matchs) {
			foreach ($matchs[1] as $key=>$value){
				$tmp = array('url'=>$this->prefix_domain . $value, 'name'=>$matchs[2][$key]);
				$list_data[] = $tmp;
			}
		}
		print_r($list_data);
	}
	
	function getUrlData($url) {
		return file_get_contents($url);
	}
}