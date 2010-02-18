<?php
class DataFilter {
	function pick($source, $key) {
		if (isset($source[$key])) {
			return $source[$key];
		}else {
			return false;
		}
	}
}