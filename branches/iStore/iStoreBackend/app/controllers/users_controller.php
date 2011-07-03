<?php
class UsersController extends AppController {

	var $name = 'Users';


	function login() {

	}

    function auth() {
		$username = $this->params['form']['username'];
		$passwd = $this->params['form']['passwd'];
		$data = array('User'=>array('username'=>$username, 'passwd'=>$passwd ));
    	if ($this->Auths->login($data)) {
//    		echo "done";
//			$this->redirect('/dashboard');
    		$this->printJson($this->returnMsg(true, __('Login success', true)));
		} else {
//			echo 'fail';
    		$this->printJson($this->returnMsg(false, __('Login fail', true)));

		}
    }

    function logout() {
        $this->redirect( $this->Auths->logout() );
    }

	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function listing() {
		$this->User->recursive = 0;
//		$all_data = $this->User->find('all', array('order' => 'User.created DESC'));
		$conditions = array();
		if (isset($this->params['form']['name'])) {
			$conditions['username  LIKE'] = $this->params['form']['name'] . "%";
		}
//		$conditions = array('order' => 'User.created DESC');
//		debug($this->params);
		$this->paginate['User'] = array(
			'limit' 	=> isset($this->params['form']['rows']) ? $this->params['form']['rows'] : $this->page_rows,
			'page' => isset($this->params['form']['page']) ? $this->params['form']['page'] : 1,
			'order' => 'User.created DESC',
		);
		$all_data = $this->paginate(null, $conditions);
		$res = Set::extract($all_data,'{n}.User');
		$this->printJson(array('total'=>$this->params['paging']['User']['count'],'rows'=>$res));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		$res = array('success'=>false, 'msg'=>'新增信息失败');
		$username = $this->params['form']['username'];
		$passwd = $this->params['form']['passwd'];
		if (!empty($username)) {
			$this->User->create();
			if ($this->User->save(array('User'=>array('username'=>$username, 'passwd'=>$passwd)) )) {
				$res = array('success'=>true, 'msg'=>__('The user has been saved', true));
			}
		}
		$this->printJson($res);
	}

	function edit($id = null) {
		if (!empty($this->params['form'])) {
			$id = $this->params['form']['username'];
			$username = $this->params['form']['username'];
			$passwd = $this->params['form']['passwd'];
			$arr = array('User'=>array('id'=>$id,'username'=>$username, 'passwd'=>$passwd));
			if ($this->User->save($arr)) {
				$this->printJson($this->returnMsg(true, __('The user has been saved', true)));
			} else {
				$this->printJson($this->returnMsg(false, __('The user could not be saved. Please, try again.', true)));
			}
		}elseif (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
			$this->data['User']['data\[User\]\[username\]'] = $this->data['User']['username'];
			$this->printJson($this->data['User']);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>