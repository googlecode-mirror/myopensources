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

/**
 *
 * File description
 *
 * @package    Checkout
 * @subpackage Checkout
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-4-16
 * @version 1.0.0 $id$
 */
class UserOrdersController extends GalleryController {
	
    /**
     * @see GalleryController::handleRequest
     */
	function handleRequest($form) {
		;
	}
	
}

/**
 * View Checkout Transactions
 */
class UserOrdersView extends GalleryView {
    /**
     * @see GalleryView::loadTemplate
     */
    function loadTemplate(&$template, &$form) {
		global $gallery;
		
		//--- check login
	    list ($ret, $isAnonymous) = GalleryCoreApi::isAnonymousUser();
	    if ($ret) { return array($ret, null); }
		
	    //--- get current user info --
        $user = $gallery->getActiveUser();

	    if ($isAnonymous || $user->isLocked() /* || !$isOn */) {
	      return array(GalleryCoreApi::error(ERROR_PERMISSION_DENIED), null);
	    }

	    //------- get user order ---
	    GalleryCoreApi::requireOnce('modules/checkout/classes/CheckoutTransactionHelper.class');
	    $criteria = ' [GalleryCheckoutTransaction::buyerId]  = '.$user->getId();
	    $orders = CheckoutTransactionHelper::fetchCheckoutTransactions($criteria);
		$order_list = null;
		if ( is_array($orders) ) {
			foreach ($orders[1] as $key=>$order) {
				$tmp = array(
					'date' => $order->getDate(),
					'amount' => $order->getAmount(),
					'first_name' => $order->getFirstName(),
					'email' => $order->getEmail(),
					'recipient_name' => $order->getRecipientName(),
				
				);
				
				$order_list[] = $tmp;
			}
			
		}
		
	    $template->setVariable('order_list', $order_list);
		return array(null,    array('body' => 'modules/userorders/templates/UserOrders.tpl'));
    }
	
}
	

?>