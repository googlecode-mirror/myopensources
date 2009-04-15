<?php
/*
 * $RCSfile: module.inc,v $
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
 * 
 * @package CheckoutNoChex
 * @author Dayo Akanji <info@dakanji.com>
 */
 
/**
 * Checkout plugin to process payments by NoChex.com
 *
 * @package CheckoutNoChex
 */
class CheckoutNoChexModule extends GalleryModule {

    function CheckoutNoChexModule() {
	global $gallery;		
	$this->setId('checkoutnochex');
	$this->setName('Checkout NoChex');
	$this->setDescription($gallery->i18n('Complete Checkout by NoChex'));
	$this->setVersion('0.2.0.1');
	$this->setGroup('commerce', $gallery->i18n('Commerce'));
	$this->setCallbacks('getSiteAdminViews');
	$this->setRequiredCoreApi(array(7, 2));
	$this->setRequiredModuleApi(array(3, 0));
    }

    /**
     * @see GalleryModule::performFactoryRegistrations()
     */
    function performFactoryRegistrations() {
	/* Register our plugin */
	$ret = GalleryCoreApi::registerFactoryImplementation(
	    'CheckoutPaymentInterface_1_3', 'CheckoutNoChexPaymentPlugin', 'CheckoutNoChexPayment',
            'modules/checkoutnochex/classes/CheckoutNoChexPaymentPlugin.class', 'checkoutnochex', null);
	if ($ret) {
	    return $ret->wrap(__FILE__, __LINE__);
	}		

	return null;
    }

    /**
     * @see GalleryModule::needsConfiguration
     */
    function needsConfiguration() {
	list ($ret, $value) = $this->getParameter('nochexname');
	if ($ret) {
	    return array($ret->wrap(__FILE__, __LINE__), null);
	}
	return array(null, empty($value));
    }

    /**
     * @see GalleryModule::getSiteAdminViews
     */
    function getSiteAdminViews() {
	return array(null, array(array('name' => $this->translate('Checkout NoChex'), 
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
