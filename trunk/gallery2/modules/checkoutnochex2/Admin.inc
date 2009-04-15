<?php
/*
 *
 * Gallery - a web based photo album viewer and editor
 * Copyright (C) 2000-2005 Bharat Mediratta
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
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

 /**
 * @package CheckoutNochex
 * @subpackage UserInterface
 * @author Alec Myers <alec@alecmyers.com>
 * @version $Revision:  $
 */
 
class AdminController extends GalleryController {
    /**
     * @see GalleryController::handleRequest
     */
    function handleRequest($form) {
	global $gallery;

	$ret = GalleryCoreApi::assertUserIsSiteAdministrator();
	if ($ret) {
	    return array($ret, null);
	}

	$error = array();
	$status = array();

	if (isset($form['action']['save'])) {

	    $ret = GalleryCoreApi::setPluginParameter('module', 'checkoutnochex', 'active', $form['active']);
	    if ($ret) {
		return array($ret, null);
	    }
	    $ret = GalleryCoreApi::setPluginParameter('module', 'checkoutnochex', 'ncMerchantId', $form['ncMerchantId']);
	    if ($ret) {
		return array($ret, null);
	    }	
	    $ret = GalleryCoreApi::setPluginParameter('module', 'checkoutnochex', 'ncMode', $form['ncMode']);
	    if ($ret) {
		return array($ret, null);
	    }
	    $ret = GalleryCoreApi::setPluginParameter('module', 'checkoutnochex', 'ncDescription', $form['ncDescription']);
	    if ($ret) {
		return array($ret, null);
	    }
	    $ret = GalleryCoreApi::setPluginParameter('module', 'checkoutnochex', 'ncAccountType', $form['ncAccountType']);
	    if ($ret) {
		return array($ret, null);
	    }
	    
	    list ($ret, $module) = GalleryCoreApi::loadPlugin('module', 'checkoutnochex');
            if ($ret) {
		return array($ret, null);
	    }
	    list ($ret, $isActive) = $module->isActive();
	    if ($ret) {
		return array($ret, null);
	    }

	    $redirect['view'] = 'core.SiteAdmin';
	    if ($isActive) {
		$redirect['subView'] = 'checkoutnochex.Admin';
		$status['saved'] = 1;
	    } else {
		$redirect['subView'] = 'core.AdminModules';
		$status['configured'] = 'Checkout by Nochex';
	    }

	} else if (isset($form['action']['cancel'])) {
		
	    $redirect['view'] = 'core.SiteAdmin';
	    $redirect['subView'] = 'checkoutnochex.Admin';
	}

	if (!empty($redirect)) {
	    $results['redirect'] = $redirect;
	} else {
	    $results['delegate']['view'] = 'core.SiteAdmin';
	    $results['delegate']['subView'] = 'checkoutnochex.Admin';
	}

	$results['status'] = $status;
	$results['error'] = $error;

	return array(null, $results);
    }
}



class AdminView extends GalleryView {
    /**
     * @see GalleryView::loadTemplate
     */
    function loadTemplate(&$template, &$form) {
	global $gallery;

	if ($form['formName'] != 'AdminCheckoutNochex') {
	    $form['formName'] = 'AdminCheckoutNochex';  
	    list ($ret, $form['active']) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'active');
	    if ($ret) {
		return array($ret, null);
	    }
	    list ($ret, $form['ncMerchantId']) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'ncMerchantId');
	    if ($ret) {
		return array($ret, null);
	    }
	    list ($ret, $form['ncMode']) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'ncMode');
	    if ($ret) {
		return array($ret, null);
            }
            list ($ret, $form['ncAccountType']) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'ncAccountType');
	    if ($ret) {
		return array($ret, null);
            }
            list ($ret, $form['ncDescription']) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'ncDescription');
	    if ($ret) {
		return array($ret, null);
            }
	}

	$template->setVariable('controller', 'checkoutnochex.Admin');
	return array(null, array('body' => 'modules/checkoutnochex/templates/Admin.tpl'));
    }
}
?>
