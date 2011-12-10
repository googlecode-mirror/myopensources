<?php
class ArticleController extends Arzen_Rest_Controller
{

	
	public function indexAction()
	{
		$data = array(
			"id"=>1,
			"name"=>"手机QQ2011正式版",
			"icon"=>"http://image.apk.gfan.com/asdf/PImages/2011/8/1471_6fd6cd76-bb9a-442a-8c47-40d7de7993ed_icon.png",
			"name"=>"手机QQ2011正式版",
			"author"=>"腾讯",
			"size"=>"4.44 M",
			"price"=>"0.99",
			"pub-date"=>"2011-11-22",
			"desc"=>"QQ for Android 是腾讯公司针对日渐增多的Android用户，推出的基于Android操作系统平台的即时通讯工具，让您的沟通变得更加自由",
		
		);
		$datas = array();
		for ($i = 0; $i < 10; $i++) {
			$datas[] = $data;
		}
		$this->sendResponse($datas);
		
	}

	public function getAction()
	{
		$data = array(
			"id"=>1,
			"name"=>"手机QQ2011正式版",
			"icon"=>"http://image.apk.gfan.com/asdf/PImages/2011/8/1471_6fd6cd76-bb9a-442a-8c47-40d7de7993ed_icon.png",
			"name"=>"手机QQ2011正式版",
			"author"=>"腾讯",
			"size"=>"4.44 M",
			"price"=>"0.99",
			"pub-date"=>"2011-11-22",
			"content"=>"QQ for Android 是腾讯公司针对日渐增多的Android用户，推出的基于Android操作系统平台的即时通讯工具，让您的沟通变得更加自由 

手机QQ2011(Android)正式版更新特性： 
1.加、退群功能完善和优化 
2.搜索界面展示优化并加入群搜索结果 
3.新增部分超级QQ功能 
4.修复添加好友不成功、长昵称显示不全等BUG 
5.更多优化等待您的发现 

手机QQ2011(Android)Beta4Build0175更新特性： 
1.自定义皮肤功能，并新增一套蓝色皮肤 
2.收发图功能完善和优化 
3.新增修改头像和建群的超Q特权功能 
4.新增为电信手机用户定制的注册入口 
5.更多优化等待你的发现~~ 

手机QQ2011(Android)Beta3Build0115更新特性： 
1.优化视频使用过程中的程序稳定性。 
2.优化后台挂机等情况下的程序稳定性。",
			'photo1'=>"http://image.apk.gfan.com/asdf/PImages/2011/6/1471_2d03fba4e-2960-4427-b6c8-6f89085893b6.png",
			'photo2'=>"http://image.apk.gfan.com/asdf/PImages/2011/8/1471_2f316364b-499d-4b29-843e-f4b70549c712.jpg",
			'download'=>"http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?src=apkpage&apk=5srYOmgY48dfQusxtHdbExjhtWtMp18vRqTDqmf7IzlZU293IrCB23qYaQFNk1RBHKLSu7Q9r7OZz/FVofHfePGiCtUCwR/7b93H3IDl0add0l1ik=",
		
		);
		
		$this->sendResponse($data);
		
		
	}
	
	function postAction() {
		$uploaddir = $this->config->upload->path;
		if (!file_exists($uploaddir)) {
			mkdir($uploaddir, 0755, true);
		}
		$key = "file";
		$file_name = basename($_FILES[$key]['name']);
		$uploadfile = $uploaddir .$file_name;
		if ( !copy($_FILES[$key]['tmp_name'], $uploadfile) ) {
			return false;
		}
		$this->sendResponse($sub_dir . $file_name);
		
	}

}