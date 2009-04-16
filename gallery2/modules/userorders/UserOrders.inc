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
 * User Orders View
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

		$SQLsortBy = "[GalleryCheckoutTransaction::date]";
		$order = 'DESC';
	    $results = array();
		$query = "SELECT 
			[GalleryCheckoutTransaction::date], 			
			[GalleryCheckoutTransaction::id],
			[GalleryUser::fullName],
			[GalleryUser::userName],
			[GalleryCheckoutTransaction::recipientName],
			[GalleryCheckoutTransaction::host],
			[GalleryCheckoutTransaction::paymentPlugin],
			[GalleryCheckoutTransaction::amount],
			[GalleryCheckoutTransaction::timePaid],		
			[GalleryCheckoutTransaction::timeCleared],
			[GalleryCheckoutTransaction::timeFulfil],
			[GalleryCheckoutTransaction::timeFulfilled],
			[GalleryCheckoutTransaction::timeCompleted],
			[GalleryCheckoutTransaction::timeHold],
			[GalleryCheckoutTransaction::timeProblem]
			FROM [GalleryCheckoutTransaction]
			INNER JOIN [GalleryUser]
			ON [GalleryUser::id] = [GalleryCheckoutTransaction::buyerId]
			WHERE ( ([GalleryCheckoutTransaction::paymentPlugin] IS NOT NULL)
			  OR ([GalleryCheckoutTransaction::timeConfirmed] != 0))
			  AND [GalleryCheckoutTransaction::buyerId]  = {$user->getId()}
			ORDER BY $SQLsortBy $order
			";
		list($ret, $searchResults) = $gallery->search($query);
		if ($ret) {
			return array($ret, null);
		}
		$txns = array();
		while ($result = $searchResults->nextResult()) {
			$txns[]=$result;
		}
		$perPage = 50;
		$countOrders = 0;
		if (isset ($txns)) {
			$countOrders = count($txns);
		}
		$pageDetails['count'] = $countOrders;
		$pageDetails['pageSize'] = $countOrders > $perPage ? $perPage : $countOrders;
		/* Figure out our max pages, make sure our current page fits in it */
		$pageDetails['maxPages'] = ceil($countOrders / $perPage);
		$pageDetails['page']  = min ($pageDetails['maxPages'],$page);
		/* Calculate the next/back pages */
		$pageDetails['nextPage'] = min($pageDetails['page']+1, $pageDetails['maxPages']);
		$pageDetails['backPage'] = max(1, $pageDetails['page']-1);
		/* Calculate which names to show */
		$pageDetails['start'] = ($pageDetails['page']-1) * $perPage;
		$template->setVariable('pageDetails', $pageDetails);
		$template->setVariable('txns', $txns);


		return array(null,    array('body' => 'modules/userorders/templates/UserOrders.tpl'));
    }
	
}
	

?>