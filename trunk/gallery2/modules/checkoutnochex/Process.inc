<?php
/*
 * $RCSfile: Email.inc,v $
 *
 * Gallery - a web based photo album viewer and editor
 * Copyright (C) 2000-2004 Bharat Mediratta
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
 * 
 * @package CheckoutNoChex
 * @subpackage UserInterface
 * @author Dayo Akanji <info@dakanji.com>
 */

/**
 * This controller handles the email checkout process for the NoChex Module
 *
 * @package CheckoutNoChex
 * @subpackage UserInterface
 *
 */

class ProcessController extends GalleryController {

    /**
     * @see GalleryController::handleRequest()
     */
    function handleRequest($form) {
	global $gallery;
	$session =& $gallery->getSession();					

	if (isset($form['action']['process'])) {
	    
		$nextView = 'checkoutnochex.Review';

		/* Get parameters from the checkout plugin */
		list ($ret, $postage) = GalleryCoreApi::getPluginParameter('module', 'checkout', 'postage');
		if ($ret) {
		    return array($ret->wrap(__FILE__, __LINE__), null);
		}
		list ($ret, $csymbol) = GalleryCoreApi::getPluginParameter('module', 'checkout', 'csymbol');
		if ($ret) {
		    return array($ret->wrap(__FILE__, __LINE__), null);
		}

		/* Get our plugin parameters */
		list ($ret, $fromAddress) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'fromAddress');
		if ($ret) {
		    return array($ret->wrap(__FILE__, __LINE__), null);
		}
		list ($ret, $subject) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'subject');
		if ($ret) {
		    return array($ret->wrap(__FILE__, __LINE__), null);
		}

		/* Begin constructing the data to pass to the email templates */
		$email = array( 'transactionId' => unserialize($session->get('checkoutnochex.transactionId')),
	    		        'items' => unserialize($session->get('checkoutnochex.items')),
	    		        'product' => unserialize($session->get('checkoutnochex.product')),
	    		        'price' => unserialize($session->get('checkoutnochex.price')),
	    		        'paper' => unserialize($session->get('checkoutnochex.paper')),
	    		        'postage' => $postage,
	    		        'csymbol' => $csymbol,
	    		        'total' => unserialize($session->get('checkoutnochex.total')),
	    		        'custFirstName' => $form['custFirstName'],
	    		        'custLastName' => $form['custLastName'],
	    		        'custEmail' => $form['custEmail'],
	    		        'custAddress1' => $form['custAddress1'],
	    		        'custAddress2' => $form['custAddress2'],
	    		        'custAddress3' => $form['custAddress3'],
	    		        'custAddress4' => $form['custAddress4'],
	    		        'custAddress5' => $form['custAddress5'],
	    		        'custZip' => $form['custZip'],
	    		        'custCountry' => $form['custCountry'],
	    		        'custComments' => $form['custComments'],
			       );
	
		/* Load the thumbnails */
		list ($ret, $thumbnailList) = GalleryCoreApi::fetchThumbnailsByItemIds(array_keys($email['items']));
		if ($ret) {
		    return array($ret->wrap(__FILE__, __LINE__), null);
		}
		foreach ($thumbnailList as $thumbnail) {
		    $email['thumbnails'][$thumbnail->getParentId()] = (array)$thumbnail;
		}	
	    
		/* Now cycle through the email recipients */
		list ($ret, $numAddresses) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'numAddresses');
		if ($ret) {
		    return array($ret->wrap(__FILE__, __LINE__), null);
		}
		for($i=0;$i<$numAddresses;$i++) {
		    list ($ret, $toAddress) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'toAddress'.$i);
		    if ($ret) {
			return array($ret->wrap(__FILE__, __LINE__), null);
		    }
		    /* Parse the 'to' address to replace customer@gallery with the customer-provided address */
		    if (GalleryUtilities::isValidEmailString($form['custEmail'])) {
		        $toAddress = preg_replace(array('/,customer\@gallery,/',
						        '/^customer\@gallery,/',
						        '/^customer@gallery$/',
						        '/,customer\@gallery$/'),
					          array(','.$email['custEmail'].',',
						        $email['custEmail'].',',
						        $email['custEmail'],
						        ','.$email['custEmail']),
					          $toAddress);
		    } else {
		        $toAddress = preg_replace(array('/,customer\@gallery,/',
						        '/^customer\@gallery,/',
						        '/^customer@gallery$/',
						        '/,customer\@gallery$/'),
					          array(',',
						        '',
						        '',
						        ''),
					          $toAddress);
		    }
		    list ($ret, $temp) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'showCustomer'.$i);
		    if ($ret) {
		        return array($ret->wrap(__FILE__, __LINE__), null);
		    }
		    if ($temp==1) {
		        $email['showCustomer'] = true;
		    } else {
		        $email['showCustomer'] = false;
		    }
		    list ($ret, $temp) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'showThumbs'.$i);
		    if ($ret) {
		        return array($ret->wrap(__FILE__, __LINE__), null);
		    }
		    if ($temp==1) {
		        $email['showThumbs'] = true;					
		    } else {
		        $email['showThumbs'] = false;
		    }
		    list ($ret, $temp) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'showLinks'.$i);
		    if ($ret) {
		        return array($ret->wrap(__FILE__, __LINE__), null);
		    }
		    if ($temp==1) {
		        $email['showLinks'] = true;
		    } else {
		        $email['showLinks'] = false;
		    }
		
		    $email['boundary'] = uniqid('checkoutnochex');
		
		    $headers = "MIME-Version: 1.0\n";
		    $headers .= "Content-Type: multipart/alternative;\n";
		    $headers .= '	boundary = "' . $email['boundary'] . '"';
		
		    /* This is where we actually send the email */
		    $ret = GalleryCoreApi::sendTemplatedEmail( 
			    'modules/checkoutnochex/templates/Message.tpl', $email, $fromAddress, $toAddress, $subject, $headers);
		    if ($ret) {
		        return array($ret->wrap(__FILE__, __LINE__), null);
		    }
		    /* Now write the customer information back into the original transaction */
		    list ($ret, $transaction) = GalleryCoreApi::loadEntitiesById($email['transactionId']);
		    if ($ret) {
			return array($ret->wrap(__FILE__, __LINE__), null);
		    }
		    if (!isset($transaction)) {
			return array(GalleryCoreApi::error(ERROR_MISSING_OBJECT, __FILE__, __LINE__), null);
		    }
		    /* Get a write lock for the transaction and refresh from database */
		    list ($ret, $lockId) = GalleryCoreApi::acquireWriteLock(array($transaction->getId()));
		    if ($ret) {
			return array($ret->wrap(__FILE__, __LINE__), null);
		    }
		    list ($ret, $transaction) = $transaction->refresh();
		    if ($ret) {
			return array($ret->wrap(__FILE__, __LINE__), null);
		    }
		    /* Set the customer information into the original transaction */
		    $transaction->setFirstName($email['custFirstName']);
		    $transaction->setLastName($email['custLastName']);
		    $transaction->setEmail($email['custEmail']);
		    $transaction->setAddress1($email['custAddress1']);
		    $transaction->setAddress2($email['custAddress2']);
		    $transaction->setAddress3($email['custAddress3']);
		    $transaction->setAddress4($email['custAddress4']);
		    $transaction->setAddress5($email['custAddress5']);
		    $transaction->setAddressZip($email['custAddressZip']);
		    $transaction->setAddressCountry($email['custAddressCountry']);
		    $transaction->setCustNotes($email['custComments']);
            $transaction->setPaymentPlugin('checkoutnochex');
            $transaction->setFlagPaid(TRUE);
		    /* Save the modified transaction */
		    $ret = $transaction->save();
		    if ($ret) {
			return array($ret->wrap(__FILE__, __LINE__), null);
		    }
		    /* Release our lock */
		    $ret = GalleryCoreApi::releaseLocks($lockId);
		    if ($ret) {
			return array($ret->wrap(__FILE__, __LINE__), null);
		    }

		}

	} else if (isset($form['action']['getdetails'])) {
	    $nextView = 'checkoutnochex.Details';
	}

	/* not really sure how to deal with these variables... but they're needed */
	$error = array();
	$isError = false;
	$status = array();
	$results = array();						
			
	$results['delegate']['view'] = $nextView;			
	$results['status'] = $status;
	$results['error'] = $error;
	$results['isError'] = $isError;
	$errorView = '';
		
	return array(null, $results);
	 
    }
}
?>