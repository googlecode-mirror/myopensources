<?php
/*
 * Gallery - a web based photo album viewer and editor
 * Copyright (C) 2000-2007 Bharat Mediratta
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street - Fifth Floor, Boston, MA  02110-1301, USA.
 */

GalleryCoreApi::requireOnce('modules/userdata/classes/UserDataHelper.class');

/**
 * This plugin will handle assigning values to custom fields
 * @package UserData
 * @subpackage UserInterface
 * @author Serban Constantinescu <serban.constantinescu@gmail.com>
 * @version $Revision: 15513 $
 */
class UserDataController extends GalleryController {

    /**
     * @see GalleryController::handleRequest
     */
    function handleRequest($form) {
	$status = array();
	$error = array();
	$results = array();
	    
	global $gallery;
        $user = $gallery->getActiveUser();
      
        $params=$form['fields'];
	    
	list ($ret, $module) = GalleryCoreApi::loadPlugin('module', 'userdata');
	if ($ret) { return array($ret, null); }

	if (isset($form['action']['save'])) {
	    $ret = UserDataHelper::saveFieldValues($user, $form['fields']);
	    if ($ret) { return array($ret, null); }
	    list ($ret, $module) = GalleryCoreApi::loadPlugin('module', 'userdata', 'userdata');
	    if ($ret) {	return array($ret, null); }

	    $status['saved'] = 1;
	    $results['redirect']['view'] = 'core.UserAdmin';
	    $results['redirect']['subView'] = 'userdata.UserData';

	}
        $results['error'] = $error;
        $results['status'] = $status;
	    
	return array(null, $results);
    }

}




/**
 * Manage user watermarks
 */
class UserDataView extends GalleryView {

    /**
     * @see GalleryView::loadTemplate
     */
    function loadTemplate(&$template, &$form) {
	    global $gallery;
	    GalleryCoreApi::requireOnce('modules/userdata/classes/UserDataHelper.class');

	    list ($ret, $isAnonymous) = GalleryCoreApi::isAnonymousUser();
	    if ($ret) { return array($ret, null); }
	    list ($ret, $isOn) =
	      GalleryCoreApi::getPluginParameter('module', 'userdata', 'allowUserData');
	    if ($ret) { return array($ret, null); }

      $user = $gallery->getActiveUser();

	    if ($isAnonymous || $user->isLocked() /* || !$isOn */) {
	      return array(GalleryCoreApi::error(ERROR_PERMISSION_DENIED), null);
	    }


      list ($ret, $fields) = UserDataHelper::FetchFieldValues($user);
      if ($ret) { return array($ret, null); }

      /* empty */
      $template->setVariable('UserDetails', array());

	    if ($form['formName'] != 'UserData') {
	        $form['formName'] = 'UserData';
	    }

      $form['fields'] = $fields;

	    $template->setVariable('controller', 'userdata.UserData');
	    return array(null, array('body' => 'modules/userdata/templates/UserData.tpl'));
    }

    /**
     * @see GalleryView::getViewDescription
     */
    function getViewDescription() {
	    list ($ret, $core) = GalleryCoreApi::loadPlugin('module', 'userdata');
	    if ($ret) { return array($ret, null); }
    	return array(null, $core->translate('User Profile Data'));
    }
}


?>
