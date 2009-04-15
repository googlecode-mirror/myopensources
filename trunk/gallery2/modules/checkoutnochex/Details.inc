<?php
/*
 * $RCSfile: Details.inc,v $
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
 * @version
 * @package CheckoutNoChex
 * @author Dayo Akanji <info@dakanji.com>
 */

/**
 * This view is for collecting the user's details
 *
 * @package checkoutnochex
 * @subpackage UserInterface
 */
class DetailsView extends GalleryView {

    /**
     * @see GalleryView::loadTemplate
     */
    function loadTemplate(&$template, &$form) {
        global $gallery;
        $session =& $gallery->getSession();
        $urlGenerator =& $gallery->getUrlGenerator();
        
        /* Get the current user information */
        $user = $gallery->getActiveUser();
        $userdata = (array)$user;
        
        /* Populate the form if a user is logged in */
        if ($userdata['fullName'] != 'Guest') {
            list($form['custFirstName'], $form['custLastName']) = 
                explode(' ', $userdata['fullName'], 2);
            $form['custEmail'] = $userdata['email']; 
        }

        /* Populate the form hidden variables */
        /* pay_to_email */
	list ($ret, $mbookersname) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'mbookersname');
	if ($ret) {
		return array($ret->wrap(__FILE__, __LINE__), null);
	}
        $form['pay_to_email'] = $mbookersname;
        /* transaction_id */
        $form['transaction_id'] = $session->get('checkoutnochex.transactionId'); 
        /* Return URL */
        $form['return_url'] = $urlGenerator->generateUrl(array('view' => 'checkoutnochex.PaymentComplete'), array('forceFullUrl' => true));
        /* Cancel URL */
        $form['cancel_url'] = $urlGenerator->generateUrl(array('view' => 'checkoutnochex.PaymentCancelled'), array('forceFullUrl' => true));
        /* Total Amount Due */
        $form['amount'] = unserialize($session->get('checkout.total'));
        /* Custom Logo */
	list ($ret, $gendesc) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'gendesc');
	if ($ret) {
		return array($ret->wrap(__FILE__, __LINE__), null);
	}
        $form['detail1_description'] = $gendesc;
        /* Generic Item Detail */
	list ($ret, $gendet) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'gendet');
	if ($ret) {
		return array($ret->wrap(__FILE__, __LINE__), null);
	}
        $form['detail1_text'] = $gendet;
        /* Note to Buyer */
	list ($ret, $buynote) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'buynote');
	if ($ret) {
		return array($ret->wrap(__FILE__, __LINE__), null);
	}
        $form['confirmation_note'] = $buynote;


        /* Wrap up */
        $form['controller'] = 'checkoutnochex.Process';

        list ($ret, $module) = GalleryCoreApi::loadPlugin('module','checkoutnochex');
        if ($ret) {
            return array($ret->wrap(__FILE__, __LINE__), null);
        }

        $template->setVariable('form', $form);
        $template->title($gallery->i18n('Checkout') . '::' . 
                         $gallery->i18n('Customer Details'));

        return array(null,
               array('body' => 'modules/checkoutnochex/templates/Details.tpl'));
    }
}
?>
