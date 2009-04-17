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

GalleryCoreApi::requireOnce('modules/checkout/classes/CheckoutTransactionHelper.class');
GalleryCoreApi::requireOnce('modules/checkout/classes/CheckoutProductMapHelper.class');
GalleryCoreApi::requireOnce('modules/checkout/classes/GalleryCheckoutApi.class');

/**
 *
 * File description
 *
 * @package    Checkout
 * @subpackage Checkout
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-4-16
 * @version 1.0.0 $id$
 */
class UserOrderDetailController extends GalleryController {
	function handleRequest($form) {
		//check plugins first...
		list ($ret, $results) = CheckoutInterfaceHelper::handleStatusPagePlugins($form);
		if ($ret) {
			return array($ret, null);
		}
		if ($results) {
			return array(null, $results);
		}
		 
		$error = array();
		$status = array();

		if (isset($form['action']['deleteOrder'])) {
			$ret = GalleryCoreApi::deleteEntityById($form['transactionId']);
			if ($ret) {
				return array($ret, null);
			}
			$status['transactionDeleted'] = 1;
			$results['redirect']['view'] = 'core.UserAdmin';
			$results['redirect']['subView'] = 'userorders.UserOrders';
			$results['status'] = $status;
			$results['error'] = $error;
			return array(null, $results);
		}

		$results['redirect']['view'] = 'core.UserAdmin';
		$results['redirect']['subView'] = 'userorders.UserOrderDetail';
		$results['redirect']['transactionId'] = $form['transactionId'];
		$results['status'] = $status;
		$results['error'] = $error;
		return array(null, $results);
		
	}
}

/**
 * User Orders Detail View
 */
class UserOrderDetailView extends GalleryView {
    /**
     * @see GalleryView::loadTemplate
     */
    function loadTemplate(&$template, &$form) {
		global $gallery;
		
		/* Figure out which item we're talking about */
		$form['transactionId'] = (int)GalleryUtilities::getRequestVariables('transactionId');
		if (empty($form['transactionId'])) {
			return array (GalleryCoreApi::error(ERROR_BAD_PARAMETER), null);
		}
	  
		list($ret, $tpl['busname']) = GalleryCoreApi::getPluginParameter('module','checkout','busname');
		if ($ret) {
			return array($ret, null);
		}

		/* plugins */
		list ($ret, $plugins) = CheckoutInterfaceHelper::getStatusPagePlugins($template, $form);
		if ($ret) {
			return array($ret, null);
		}

		/* empty */
		$template->setVariable('UserOrderDetail', array());

		if ($form['formName'] != 'UserOrderDetail') {
			$form['formName'] = 'UserOrderDetail';
		}
		$tpl['id'] = $form['transactionId'];
		
		//---- fetch order info ----
		list ($ret, $transaction) = GalleryCoreApi::loadEntitiesById($form['transactionId']);
		if ($ret) {
			return array($ret, null);
		}
		$allow_delete = true;
		if (
			$transaction->getTimePaid()
			||$transaction->getTimeCleared()
			||$transaction->getTimeFulfil()
			||$transaction->getTimeCompleted()
			) {
			$allow_delete = false;
		}
		$template->setVariable('transactionId',$form['transactionId']);
		$template->setVariable('allow_delete',$allow_delete);
		$template->setVariable('statusPlugins',$plugins);
		$template->title($tpl['busname'] . '::' . $gallery->i18n('Checkout'));
		$template->setVariable('tpl', $tpl);
		$template->setVariable('controller', 'userorders.UserOrderDetail');
		return array(null,    array('body' => 'modules/userorders/templates/UserOrderDetail.tpl'));
    }
}


?>