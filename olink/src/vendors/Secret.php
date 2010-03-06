<?php
class Secret {

	function getSlat($len=10) {
		return $salt = substr(md5(uniqid(rand(), true)), 0, $len);
	}
}