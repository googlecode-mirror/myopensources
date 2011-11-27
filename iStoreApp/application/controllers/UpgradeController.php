<?php
class UpgradeController extends Arzen_Rest_Controller
{

	
	public function indexAction()
	{
// 		客户端的提示： {appName} 发现了新版本  {versionName}，是否需要更新？
// 		appName: 应用程序名称，用在Android端的提示框信息
// 		versionName: 版本号，用在Android端的提示框信息
// 		versionCode: 版本代码，数值，用于比较是否为新版本，当值比客户端值大时，表示有新版本
// 		force: 【1/0】1：表示强制升级，不升级则不能使用程序；0:为非强制，用户可选择升级与否。
		
		$data = array(
			'appName'=>"istore",
			'appPath'=>"http://download.idreamsky.com:82/upgrade/iStoreAndroid.apk",
			'versionName'=>"1.0.1",
			'versionCode'=>2,
			'force'=>1,
		);
		$this->sendResponse($data);
		
	}
	
	
}