<?php
/*
 *
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
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */
 
GalleryCoreApi::requireOnce('modules/checkout/classes/GalleryCheckoutApi.class');

/**
 * @package CheckoutNochex
 * @subpackage UserInterface
 * @author Alec Myers <alec@alecmyers.com>
 * @version $Revision:  $
 */
 
class APCView extends GalleryView {

    /**
     * @see GalleryView::isImmediate
     */
    function isImmediate() {
	return true;
    }
    
    /**
     * @see GalleryView::renderImmedate
     */
    function renderImmediate($status, $error) {
	global $gallery;
	list ($ret, $module) = GalleryCoreApi::loadPlugin('module', 'checkoutnochex');
	if ($ret) {
	    return array($ret, null);
	}
	
	$APCPost = GalleryUtilities::getRequestVariablesNoPrefix('to_email',
								 'from_email',
								 'transaction_id',
								 'transaction_date',
								 'order_id',
								 'amount',
								 'security_key',
								 'status');
						 
	list ($ret, $transaction) = GalleryCoreApi::loadEntitiesById($APCPost[4],'GalleryCheckoutTransaction');
	/* Don't leak information */
	if ($ret) {
	    return null;
	}
	/* don't leak information */
	if (!isset($transaction)) {
	    return null;
	}		 
	
	$APCurl = "https://www.nochex.com/nochex.dll/apc/apc";
   	list ($body, $status, $headers) = GalleryCoreApi::postToWebPage($APCurl, $_POST);
   	
   	$APCVerified = false;
   	$APCReason = "APC callback failed.";
   	$success = preg_match("/^HTTP\/\d+\.\d+\s2\d{2}/", $status);
        if (!$success) {
	   $APCReason .= 'HTTP status was '.$status;
	} else {
	   $APCReason = 'Response body was '.$body;
	}
	
   	if ($body == 'AUTHORISED') {
	    $APCVerified = true;
	    $APCReason = '';
	    /* Confirm Amount */
	    if ( abs((float) str_replace(',', '', $transaction->getamount())) != abs((float) $APCPost[5]) ) {
		$APCVerified = false;
		$APCReason = 'Amount (' . $APCPost[5] .') does not match our records (' . $transaction->getamount() . '). ';
	    } 
	    /* Confirm Not Test */
	    if (  $APCPost[7] == 'test' ) {
		$APCVerified = false;
		$APCReason = 'Nochex APC status indicates TEST mode.';
	    } 
	}
						 
	if ($APCVerified) {
	    $ret = GalleryCheckoutApi:changeTransactionStatus($transaction, 'clear');
	    if ($ret) {
		return $ret;
	    }
	    $statusMessage = $module->translate('Nochex payment is completed. The Nochex payment has been accepted.');
	} else {
	    $statusMessage = $module->translate('A Nochex Automatic Payment Confirmation was received and rejected.') . "\n" . $APCReason;
	}
	
	/* Post an administrative notification event so the admin can take up events not handled automatically */
	$event = GalleryCheckoutApi:sendAdminNotification($transaction, $statusMessage);
	if ($ret) {
	    return $ret;
	}
	
	/* Add a new Nochex transaction for this APC */
	list ($ret, $ncTransaction) = GalleryCoreApi::newFactoryInstance('GalleryEntity', 'GalleryCheckoutNochexAPC');
	if ($ret) {
	    return $ret;
	}
	if (!isset($ncTransaction)) {
	    return GalleryCoreApi::error(ERROR_MISSING_OBJECT);
	}
	$ret = $ncTransaction->create($transaction->getId());
	if ($ret) {
	    return $ret;
	}
	$ncTransaction->setNcToEmail($APCPost[0]);
	$ncTransaction->setNcFromEmail($APCPost[1]);
	$ncTransaction->setNcTransactionId($APCPost[2]);
	$ncTransaction->setNcDate($APCPost[3]);
	$ncTransaction->setNcAmount($APCPost[5]);
	$ncTransaction->setNcKey($APCPost[6]);
	$ncTransaction->setNcStatus($APCPost[7]);
	$notes = time() . ' Postback received';		
	if ($APCVerified) {
	    $notes .=  ' VERIFIED ';
	} else {
	    $notes .= ' UNVERIFIED ';
    	}
	$notes .= $APCReason;
	$ncTransaction->setnotes($notes);
	$ncTransaction->save();
	
	return null;
	 
    } 
}
?>