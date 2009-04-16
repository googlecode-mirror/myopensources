<?php
/*
 * Gallery - a web based photo album viewer and editor
 * Copyright (C) 2000-2008 Bharat Mediratta
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
/**
 * @package userorders
 * @version $Revision: 17580 $
 * @author root
 */

/**
 * userorders
 *
 * Describe your new module here!
 *
 * @package Userorders
 */
class UserordersModule extends GalleryModule {

    function UserordersModule() {
	global $gallery;
	$this->setId('userorders');
	$this->setName($gallery->i18n('User Orders Listing'));
	$this->setDescription($gallery->i18n('Allow user check order  '));
	$this->setVersion('1.0.0');
	$this->_templateVersion = 1;
	$this->setCallbacks('getUserAdminViews|getSystemLinks');//getItemLinks|
	$this->setGroup('commerce', $gallery->i18n('Commerce'));
	$this->setRequiredCoreApi(array(7, 20));
	$this->setRequiredModuleApi(array(3, 6));
    }

    /**
     * @see GalleryModule::getItemLinks()
     */
    function getItemLinks($items, $wantsDetailedLinks, $permissions) {
	$links = array();
	foreach ($items as $item) {
	    $params['view'] = 'userorders.Userorders';
	    $params['itemId'] = $item->getId();
	    $links[$item->getId()][] =
		array('text' => $this->translate('userorders'), 'params' => $params);
	}

	return array(null, $links);
    }
    
    /**
     * @see GalleryModule::getUserAdminViews
     */
    function getUserAdminViews($user) {
        global $gallery;

      	list ($ret, $isAnonymous) = GalleryCoreApi::isAnonymousUser($user->getId());
      	if ($ret) { return array($ret, null); }
        $user = $gallery->getActiveUser();

        $views = array();
        if (!$isAnonymous && !$user->isLocked()) {
        	$views[] = array(
        		'name' => $this->translate('My orders '),
                'view' => 'userorders.UserOrders'
        	);
        }

        return array(null, $views);
    }
    
    /**
     * @see GalleryModule::getSystemLinks
     */
    function getSystemLinks() {
    	$links = array();
    	$links['view_order'] = array(
		'text' => $this->translate('My Orders'),
		'params' => array('view' => 'userorders.UserOrders',
				  'return' => 1));

    	return array(null, $links);
    }

    
}
?>