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
class UserOrderDetailController extends GalleryController {
	function handleRequest() {
		;
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

		$tpl['id'] = $form['transactionId'];

		$template->setVariable('statusPlugins',$plugins);
		$template->title($tpl['busname'] . '::' . $gallery->i18n('Checkout'));
		$template->setVariable('tpl', $tpl);
	    
		return array(null,    array('body' => 'modules/userorders/templates/UserOrderDetail.tpl'));
    }
}


?>