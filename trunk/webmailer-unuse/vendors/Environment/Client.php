<?php
/**
 *
 * File Desription
 * 
 * @package    Vendor
 * @subpackage Environment
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-2-21
 * @version 1.0.0 $id$
 */

class Environment_Client 
{
	function getClientIP() 
	{
		if(isset($_SERVER["HTTP_X_FORWARDED_FOR"]) && $_SERVER["HTTP_X_FORWARDED_FOR"] ) 
		{
			if($leng = strpos($_SERVER["HTTP_X_FORWARDED_FOR"], ",")) 
			{
				$addip = substr($_SERVER["HTTP_X_FORWARDED_FOR"],0,$leng);
			}
			else
			{
				$addip =$_SERVER["HTTP_X_FORWARDED_FOR"];
			}
		}
		else
		{
			$addip = $_SERVER["REMOTE_ADDR"];
		}
		return $addip;

	}
}
