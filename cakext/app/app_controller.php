<?php
/* SVN FILE: $Id: app_controller.php 7945 2008-12-19 02:16:01Z gwoo $ */
/**
 * Short description for file.
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @version       $Revision: 7945 $
 * @modifiedby    $LastChangedBy: gwoo $
 * @lastmodified  $Date: 2008-12-18 18:16:01 -0800 (Thu, 18 Dec 2008) $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Short description for class.
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {
	var $helpers = array('Html', 'Form', 'Javascript', 'Time');
	var $components = array('Auths');
	var $isAuthorized = false;


    function beforeFilter() {
    	$this->__withLoggedIn();
    }


	/**
	 * If admin is not logged in redirect to login screen and exit
	 *
	 */
	function __withLoggedIn() {

		$this->Auths->allow("users", 'ajax_login');
        $this->Auths->loginAction = array(Configure::read('Routing.admin') => false, 'controller' => 'users', 'action' => 'login');
        $this->Auths->logoutRedirect = array(Configure::read('Routing.admin') => false, 'controller' => 'users', 'action' => 'logout');
        $this->Auths->loginError = __('Login failed. Invalid username or password.', true);
        $this->Auths->authError = __('You are not authorized to access that location.', true);
//        $this->Session->delete('Auth.redirect');

	}

}
?>