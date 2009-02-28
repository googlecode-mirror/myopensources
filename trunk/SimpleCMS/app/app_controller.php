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
 * @lastmodified  $Date: 2008-12-18 20:16:01 -0600 (Thu, 18 Dec 2008) $
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
	var $breakcrumb = null;
	
    function beforeFilter() {
        // Admin area requires authentification
    	if ($this->isAdminAction()) {
        	
            $this->__withLoggedIn();
        	
        	$this->layout = 'admin_default';
        	$this->{$this->modelClass}->AuthUser = $this->Auths->user(); 
        	$this->set('authuser', $this->Auths->user());
        	
        } else {
        	
        	$this->__withoutLogin();
        	
			$this->layout = 'default';
			
        }
    	
    }
    	
	
	function beforeRender() {
		
		
	}
	
	/**
	 * If admin is not logged in redirect to login screen and exit
	 *
	 */
	function __withLoggedIn() {
		
        $this->Auths->loginAction = array(Configure::read('Routing.admin') => false, 'controller' => 'users', 'action' => 'login');
        $this->Auths->logoutRedirect = array(Configure::read('Routing.admin') => false, 'controller' => 'users', 'action' => 'logout');
        $this->Auths->loginError = __('Login failed. Invalid username or password.', true);
        $this->Auths->authError = __('You are not authorized to access that location.', true);
//        $this->Session->delete('Auth.redirect');
        
	}
	
	function __withoutLogin() {
		$this->Auths->allow("*");
	}
	
	
    /**
     * Tell wheather the current action should be protected
     *
     * @return bool
     */
    function isAdminAction() {
        return (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') or isset($this->params['admin']);
    }
	
}
?>