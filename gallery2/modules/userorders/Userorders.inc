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
 * @version $Revision: 17580 $
 * @package Userorders
 * @subpackage UserInterface
 * @author root
 */

/**
 * Handle input from our sample page
 *
 * @package Userorders
 * @subpackage UserInterface
 *
 */
class UserordersController extends GalleryController {
    /**
     * @see GalleryController::handleRequest()
     */
    function handleRequest($form) {
	global $gallery;

	$itemId = GalleryUtilities::getRequestVariables('itemId');

	$redirect = array();
	$status = array();
	$error = array();
	if (isset($form['action']['save'])) {
	    $ret = GalleryCoreApi::removeMapEntry('UserordersMap', array('itemId' => $itemId));
	    if ($ret) {
	        return array($ret, null);
	    }

	    $ret = GalleryCoreApi::addMapEntry(
                'UserordersMap',
                array('itemId' => $itemId, 'itemValue' => $form['value']));
	    if ($ret) {
	        return array($ret, null);
	    }

	    /* Send the user to a confirmation page, for now */
	    $redirect['view'] = 'userorders.Userorders';
	    $redirect['itemId'] = (int)$itemId;
	    $status['added'] = 1;
	}

	$results['status'] = $status;
	$results['error'] = $error;
	$results['redirect'] = $redirect;

	return array(null, $results);
    }
}

/**
 * This is a sample page generated by the Gallery 2 module creator.
 *
 * @package Userorders
 * @subpackage UserInterface
 *
 */
class UserordersView extends GalleryView {

    /**
     * @see GalleryView::loadTemplate
     */
    function loadTemplate(&$template, &$form) {
	/* Load our item */
	list ($ret, $item) = $this->getItem();
	if ($ret) {
	    return array($ret, null);
	}

	$Userorders = array();
	$Userorders['item'] = (array)$item;
	GalleryCoreApi::requireOnce('modules/userorders/classes/UserordersHelper.class');
	list ($ret, $Userorders['value']) = UserordersHelper::getItemValue($item->getId());
	if ($ret) {
	    return array($ret, null);
	}

	$template->setVariable('Userorders', $Userorders);

	return array(null, array('body' => 'modules/userorders/templates/Userorders.tpl'));
    }
}
?>