<?php
App::import(array('Security'));
class User extends AppModel  {

	var $name = 'User';
	var $useTable = false;
	var $plan_db;

	function __construct($id = false, $table = null, $ds = null) {
		parent::__construct();
		$this->plan_db = new PlanDb();
		$file_name = $this->getFileName();
		$this->plan_db->setFilename( $file_name );
	}

	function find($data) {
		$user_name = $data["User.username"];
		if ($row = $this->getByUserName($user_name)) {
			$salt = $row[3];
			$passwd = Security::hash($data["User.password"], 'sha1', $salt );
			if ($passwd == $row[4]) {
				return array('User'=>array(
					"id" => 1,
					"username"=>$row[0],
					"user_type"=>$row[1],
					"login_type"=>$row[2],
					"salt"=>$row[3],
					"password"=>$row[4],

				));
			}
		}
		else {
			return false;
		}
	}

	function getFileName() {
		return $this->getConf() . Configure::read('admin_file');

	}

	function findAll() {
		return $this->plan_db->toArray();
	}

	function getByUserName($user_name) {
		$data = $this->plan_db->toArray();
		if (is_array($data) ) {
			foreach ($data as $key=>$item){
				if ($item[0] == $user_name){
					return $item;
				}
			}
		}
		return false;
	}

	function save($data) {
		App::import("Vendor", "Secret", array('file' => 'Secret.php') );
		$salt =  Secret::getSlat();
		$secret_password = Security::hash($data["password"], 'sha1', $salt);
		$user_name = $data["username"];
		if (! $this->getByUserName($user_name) ) {
			$this->plan_db->addField($user_name);
			$this->plan_db->addField($data["user_type"]);
			$this->plan_db->addField($data["login_type"]);
			$this->plan_db->addField($salt);
			$this->plan_db->addField($secret_password);
			$this->plan_db->endRow();
			$this->plan_db->append();
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>