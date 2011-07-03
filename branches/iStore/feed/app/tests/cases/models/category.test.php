<?php
/* Category Test cases generated on: 2011-03-31 06:47:42 : 1301554062*/
App::import('Model', 'Category');

class CategoryTestCase extends CakeTestCase {
//	var $fixtures = array('app.category');

	function startTest() {
		$this->Category =& ClassRegistry::init('Category');
	}

	function endTest() {
		unset($this->Category);
		ClassRegistry::flush();
	}
	
	function testAdd() {
		$records = array(
			array('name' => '浏览器', 'pid' => 1, 'addip' => '127.0.0.1'),
			array('name' => '主题桌面', 'pid' => 1, 'addip' => '127.0.0.1'),
			array('name' => '词典翻译', 'pid' => 1, 'addip' => '127.0.0.1'),
			array('name' => '安全防护', 'pid' => 1, 'addip' => '127.0.0.1'),
			array('name' => '输入法', 'pid' => 1, 'addip' => '127.0.0.1'),
			array('name' => '交通导航', 'pid' => 1, 'addip' => '127.0.0.1'),
			array('name' => '教育阅读', 'pid' => 1, 'addip' => '127.0.0.1'),
			array('name' => '健康医疗', 'pid' => 1, 'addip' => '127.0.0.1'),
			array('name' => '影音播放', 'pid' => 1, 'addip' => '127.0.0.1'),
			array('name' => '生活娱乐', 'pid' => 1, 'addip' => '127.0.0.1'),
			array('name' => '聊天社区', 'pid' => 1, 'addip' => '127.0.0.1'),
			array('name' => '通话通信', 'pid' => 1, 'addip' => '127.0.0.1'),
			array('name' => '金融理财', 'pid' => 1, 'addip' => '127.0.0.1'),
			array('name' => '体育竞技', 'pid' => 1, 'addip' => '127.0.0.1'),
			array('name' => '电子办公', 'pid' => 1, 'addip' => '127.0.0.1'),
			array('name' => '资讯新闻', 'pid' => 1, 'addip' => '127.0.0.1'),
			array('name' => '拍照摄影', 'pid' => 1, 'addip' => '127.0.0.1'),
			array('name' => '系统工具', 'pid' => 1, 'addip' => '127.0.0.1'),
			array('name' => '窗口小部件', 'pid' => 1, 'addip' => '127.0.0.1'),
			array('name' => '实用工具', 'pid' => 1, 'addip' => '127.0.0.1'),
			array('name' => '事务管理', 'pid' => 1, 'addip' => '127.0.0.1'),

			array('name' => '模拟器', 'pid' => 2),
			array('name' => '体育', 'pid' => 2),
			array('name' => '休闲', 'pid' => 2),
			array('name' => '益智', 'pid' => 2),
			array('name' => '角色扮演', 'pid' => 2),
			array('name' => '战略', 'pid' => 2),
			array('name' => '动作', 'pid' => 2),
			array('name' => '射击', 'pid' => 2),
			array('name' => '经营', 'pid' => 2),
			array('name' => '养成', 'pid' => 2),
			array('name' => '冒险', 'pid' => 2),
			array('name' => '网游', 'pid' => 2),
			array('name' => '棋牌', 'pid' => 2),

			array('name' => '创意游戏荟萃', 'pid' => 3, 'addip' => '127.0.0.1'),
			array('name' => '本周热门游戏', 'pid' => 3, 'addip' => '127.0.0.1'),
			array('name' => '精品动态壁纸', 'pid' => 3, 'addip' => '127.0.0.1'),
			array('name' => 'QQ产品系列', 'pid' => 3, 'addip' => '127.0.0.1'),
			array('name' => '假期出行宝典', 'pid' => 3, 'addip' => '127.0.0.1'),
			array('name' => '魅族M9完美游戏', 'pid' => 3, 'addip' => '127.0.0.1'),
			array('name' => '2010年最热游戏', 'pid' => 3, 'addip' => '127.0.0.1'),
			array('name' => '2010年最热应用', 'pid' => 3, 'addip' => '127.0.0.1'),
			array('name' => '影音播放', 'pid' => 3, 'addip' => '127.0.0.1'),
			array('name' => '装机必备', 'pid' => 3, 'addip' => '127.0.0.1'),
			array('name' => '精品游戏大作', 'pid' => 3, 'addip' => '127.0.0.1'),
			array('name' => '模拟器集结号', 'pid' => 3, 'addip' => '127.0.0.1'),
			array('name' => '消磨时光小游戏', 'pid' => 3, 'addip' => '127.0.0.1'),
			array('name' => '社区交友', 'pid' => 3, 'addip' => '127.0.0.1'),
			array('name' => '生活娱乐', 'pid' => 3, 'addip' => '127.0.0.1'),		
		
		);
		
		$this->Category->saveAll($records);
	}

}
?>