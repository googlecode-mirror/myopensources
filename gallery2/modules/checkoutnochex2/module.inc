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
 * @package CheckoutNochex
 * @author Alec Myers <alec@alecmyers.com>
 * @version $Revision:  $
 */
 
class CheckoutNochexModule extends GalleryModule {

    function CheckoutNochexModule() {
	global $gallery;		
	$this->setId('checkoutnochex');
	$this->setName('Checkout by Nochex');
	$this->setDescription($gallery->i18n('Complete checkout by  Nochex'));
	$this->setVersion('0.4.0');
	$this->setGroup('commerce', $gallery->i18n('Commerce'));
	$this->setCallbacks('getSiteAdminViews');
	$this->setRequiredCoreApi(array(7, 4));
	$this->setRequiredModuleApi(array(3, 0));
    }

    /**
     * @see GalleryModule::performFactoryRegistrations()
     */
    function performFactoryRegistrations() {
	/* Register our plugin */
	$ret = GalleryCoreApi::registerFactoryImplementation(
	    'CheckoutPaymentInterface_1_3', 'CheckoutNochexPaymentPlugin', 'CheckoutNochexPayment',
            'modules/checkoutnochex/classes/CheckoutNochexPaymentPlugin.class', 'checkoutnochex', null);
	if ($ret) {
	    return $ret;
	}		
			
	/* Register the GalleryCheckoutNochexAPC class */
	$ret = GalleryCoreApi::registerFactoryImplementation(
	    'GalleryEntity', 'GalleryCheckoutNochexAPC', 'GalleryCheckoutNochexAPC',
	    'modules/checkoutnochex/classes/GalleryCheckoutNochexAPC.class', 'checkoutnochex', null);
	if ($ret) {
	    return $ret;
	}

	/* Register to add to emails */
	$ret = GalleryCoreApi::registerFactoryImplementation(
	    'CheckoutEmailInterface_1_0', 'CheckoutNochexEmailPlugin', 'checkoutnochexemail',
            'modules/checkoutnochex/classes/CheckoutNochexEmailPlugin.class', 'checkoutnochex', null);
	if ($ret) {
	    return $ret;
	}
	return null;
    }

    /**
     * @see GalleryModule::needsConfiguration
     */
    function needsConfiguration() {
	list ($ret, $value) = $this->getParameter('ncMerchantId');
	if ($ret) {
	    return array($ret, null);
	}
	return array(null, empty($value));
    }

    /**
     * @see GalleryModule::autoConfigure
     */
    function autoConfigure() {
	list ($ret, $needsConfiguration) = $this->needsConfiguration();
	if ($ret) {
	    return array($ret, null);
	}
	return array(null, !$needsConfiguration);
    }

    /**
     * @see GalleryModule::getSiteAdminViews
     */
    function getSiteAdminViews() {
	return array(null, array(array('name' => $this->translate('Checkout by Nochex'), 
							   'view' => 'checkoutnochex.Admin')));
    }

    /**
     * @see GalleryModule::getConfigurationView
     */
    function getConfigurationView() {
	return 'checkoutnochex.Admin';
    }

 
}
?>
