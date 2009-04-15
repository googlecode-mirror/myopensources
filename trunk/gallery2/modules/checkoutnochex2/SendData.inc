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

 GalleryCoreApi::requireOnce('modules/checkout/classes/GalleryCheckoutApi.class');
 
/**
 * @package CheckoutNochex
 * @subpackage UserInterface
 * @author Alec Myers <alec@alecmyers.com>
 * @version $Revision:  $
 */
class SendDataView extends GalleryView {

    /**
     * @see GalleryView::isImmediate
     */
    function isImmediate() {
	return true;
    }

    /**
     * @see GalleryView::isControllerLike
     */
    function isControllerLike() {
	return true;
    }

    /**
     * @see GalleryView::renderImmedate
     */
    function renderImmediate($status, $error) {
	global $gallery;

//	$transaction = GalleryCheckoutApi::getCurrentTransactionForPayment();
	list ($ret, $transaction) = GalleryCheckoutApi::getCurrentTransactionForPayment();
	if ($ret) {
	    return array($ret, null);
	}
	$transactionId = $transaction->getId();
	$postage = $transaction->getPostage();
	$orderTotal = $transaction->getAmount();
	$orderAmount = $orderTotal - $postage;
	
	list ($ret, $ncMerchantId) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'ncMerchantId');
	if ($ret) {
	    return array($ret, null);
	}
	list ($ret, $ncDescription) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'ncDescription');
	if ($ret) {
	    return array($ret, null);
	}
	list ($ret, $ncMode) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'ncMode');
	if ($ret) {
	    return array($ret, null);
	}
	$verify[1] = $transaction->getDate();
	$verify[2] = $transaction->getSecurity();
	
	$nochex = array(  	'transactionId' => $transactionId,
				'order_no' => $transactionId,
				'merchant_id' => $ncMerchantId,
				'amount' => $orderAmount,
				'postage' => $postage,
				'description' => $ncDescription,
				'billing_fullname' => $transaction->getFirstName() . " " . $transaction->getLastName(),
				'billing_address' => $transaction->getAddress1(),
				'billing_postcode' => $transaction->getAddressZip(),
				'email_address' => $transaction->getEmail(),
				'customer_phone_number' => $transaction->getTelephone(),
				'test_transaction' => $ncMode,
				'verify' => $verify );
	/*
	 * here we set our own cookie that will be
	 * checked to ensure we submit our form only once.
	 */
	if (!headers_sent() /* Should only skip cookie in unit test */) {
	    setcookie('G2_nochex', '1');
	    header("Content-type: text/html; charset=UTF-8");
	}

	GalleryCoreApi::requireOnce('modules/core/classes/GalleryTemplate.class');
	$template = new GalleryTemplate(dirname(dirname(dirname(__FILE__))));
	$template->setVariable('l10Domain', 'modules_checkoutnochex');
	$template->setVariable('nochex', $nochex);
	$template->display('gallery:modules/checkoutnochex/templates/SendData.tpl');

	return null;
    }
}
?>
