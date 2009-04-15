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
 
 /**
 * Required classes
 */ 
GalleryCoreApi::requireOnce('modules/checkout/classes/GalleryCheckoutApi.class');

/**
 * @version $Revision: 1491 $
 * @package CheckoutNochex
 * @author Alec Myers <alec@alecmyers.com>
 */

 
class DetailsController extends GalleryController {

    function handleRequest($form) {
	global $gallery;
	$session =& $gallery->getSession();					
	$urlGenerator =& $gallery->getUrlGenerator();
	
	$error = array();
	$status = array();
	$results = array();			
	
	if (isset($form['action']['nochex'])) {

	    /* Parse form for required fields */
	    $form['custEmail'] = trim($form['custEmail']);
	    if (empty($form['custEmail']) || !GalleryUtilities::isValidEmailString($form['custEmail'])) { 
		$error[] = 'form[error][badEmail]';
	    }
	    $form['custFirstName'] = trim($form['custFirstName']);
	    if (empty($form['custFirstName'])) {
	    	$error[] = 'form[error][badFirstName]';
    	    }
    	    $form['custLastName'] = trim($form['custLastName']);
	    if (empty($form['custLastName'])) {
	    	$error[] = 'form[error][badLastName]';
    	    }
    	    $form['custAddress1'] = trim($form['custAddress1']);   	    
	    if (empty($form['custAddress1'])) {
	    	$error[] = 'form[error][badLine1]';
    	    }
    	    $form['custAddress2'] = trim($form['custAddress2']);   
	    if (empty($form['custAddress2'])) {
	    	$error[] = 'form[error][badLine2]';
    	    }
    	    $form['telephone'] = trim($form['telephone']);   
	    if (empty($form['telephone'])) {
	    	$error[] = 'form[error][badTelephone]';
    	    }
    	    $form['custZip'] = trim($form['custZip']);  
	    if (empty($form['custZip'])) {
	    	$error[] = 'form[error][badPostcode]';
    	    }
    	    
	    if (!$error) {
		$transactionId = $session->get('checkoutnochex.transactionId');//unserialize($session->get('checkoutemail.transactionId'));
		list ($ret, $transaction) = GalleryCoreApi::loadEntitiesById($transactionId, 'GalleryCheckoutTransaction');
		if ($ret) {
		    return array($ret, null);
		}
		if (!isset($transaction)) {
		    return array(GalleryCoreApi::error(ERROR_MISSING_OBJECT), null);
		}
		
	    	$form['custRecipientName'] = trim($form['custRecipientName']);
		if (empty($form['custRecipientName'])) {
	    	    $form['custRecipientName'] = $form['custFirstName'].' '.$form['custLastName'];
    		}
    		$ret = GalleryCheckoutApi::setPaymentPlugin($transaction, 'checkoutnochex');
		if ($ret) {
		    return array ($ret,null);
		}
		$ret = GalleryCheckoutApi::transactionUpdate($transaction, $form);
		if ($ret) {
		    return array ($ret,null);
		}
		$results['redirect']['view'] = 'checkoutnochex.SendData';//'checkoutnochex.SendData'
		$results['redirect']['authToken'] = $session->getAuthToken();
	    } else {
	    	$results['delegate']['view'] = 'checkoutnochex.Details';
	    }
    	} elseif (isset($form['action']['collect'])) {
	    	/* Entry from checkout page here */
	    	$results['delegate']['view'] = 'checkoutnochex.Details';
	    	
	}			
				
	$results['status'] = $status;
	$results['error'] = $error;
	return array(null, $results);
    }
}


/**
 * This view is for collecting the user's details
 *
 */
class DetailsView extends GalleryView {

    /**
     * @see GalleryView::loadTemplate
     */
    function loadTemplate(&$template, &$form) {
        global $gallery;
        
        if ($form['formName'] != 'Details') {
	    /* First time to this page */
	    $form['formName'] = 'Details';

	    /* Populate the form if a user is logged in */
	    list ($ret, $anonymous) = GalleryCoreApi::isAnonymousUser();
	    if ($ret) {
		return array ($ret, null);
	    }
            if (!$anonymous) {
	        $user = $gallery->getActiveUser();
		list($form['custFirstName'], $form['custLastName']) = explode(' ', $user->getFullName(), 2);
                $form['custEmail'] = $user->getEmail(); 
	    }
	}
        
        $status = $template->getVariable('status');
        
        $form['controller'] = 'checkoutnochex.Details';
        $template->title($gallery->i18n('Checkout') . '::' . $gallery->i18n('Customer Details'));

        $template->setVariable('form', $form);
        return array(null, array('body' => 'modules/checkoutnochex/templates/Details.tpl'));
    }
}
?>
