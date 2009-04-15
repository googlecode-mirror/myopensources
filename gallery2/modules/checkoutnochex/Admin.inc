<?php
/*
 * $RCSfile: Admin.inc,v $
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
 * @package CheckoutNoChex
 * @subpackage UserInterface
 */
class AdminController extends GalleryController {

    /**
     * @see GalleryController::handleRequest
     */
    function handleRequest($form) {
	global $gallery;
	$urlGenerator =& $gallery->getUrlGenerator();

	$ret = GalleryCoreApi::assertUserIsSiteAdministrator();
	if ($ret) {
	    return array($ret->wrap(__FILE__, __LINE__), null);
	}
        $user = $gallery->getActiveUser();
        $userdata = (array)$user;

	$error = array();
	$status = array();

	if (isset($form['action']['save'])) {
            if (!isset($form['nochexname'])) {
                $form['nochexname'] = $userdata['email']; 
            }
	    $ret = GalleryCoreApi::setPluginParameter('module', 'checkoutnochex', 'nochexname', $form['nochexname']);
	    if ($ret) {
		return array($ret->wrap(__FILE__, __LINE__), null);
	    }	
	    $ret = GalleryCoreApi::setPluginParameter('module', 'checkoutnochex', 'ccode', $form['ccode']);
	    if ($ret) {
		return array($ret->wrap(__FILE__, __LINE__), null);
	    }
	    $ret = GalleryCoreApi::setPluginParameter('module', 'checkoutnochex', 'mblang', $form['mblang']);
	    if ($ret) {
		return array($ret->wrap(__FILE__, __LINE__), null);
	    }
            if (!isset($form['fromAddress'])) {
                $form['fromAddress'] = $userdata['email'];
            }	
	    $ret = GalleryCoreApi::setPluginParameter('module', 'checkoutnochex', 'fromAddress', $form['fromAddress']);
	    if ($ret) {
		return array($ret->wrap(__FILE__, __LINE__), null);
	    }
            if (!isset($form['subject'])) {
                $form['subject'] = 'Your Order by MoneyBookers at ' . str_replace('/main.php','',$urlGenerator->generateUrl(array(), array('forceFullUrl' => true)));
            }
	    $ret = GalleryCoreApi::setPluginParameter('module', 'checkoutnochex', 'subject', $form['subject']);
	    if ($ret) {
		return array($ret->wrap(__FILE__, __LINE__), null);
	    }
            if (!isset($form['gendesc'])) {
                $form['gendesc'] = 'Photographic Images';
            }
	    $ret = GalleryCoreApi::setPluginParameter('module', 'checkoutnochex', 'gendesc', $form['gendesc']);
	    if ($ret) {
		return array($ret->wrap(__FILE__, __LINE__), null);
	    }
            if (!isset($form['gendet'])) {
                $form['gendet'] = 'Images from ' . str_replace('/main.php','',$urlGenerator->generateUrl(array(), array('forceFullUrl' => true)));
            }
	    $ret = GalleryCoreApi::setPluginParameter('module', 'checkoutnochex', 'gendet', $form['gendet']);
	    if ($ret) {
		return array($ret->wrap(__FILE__, __LINE__), null);
	    }
            if (!isset($form['buynote'])) {
                $form['buynote'] = 'Enjoy your purchase!';
            }
	    $ret = GalleryCoreApi::setPluginParameter('module', 'checkoutnochex', 'buynote', $form['buynote']);
	    if ($ret) {
		return array($ret->wrap(__FILE__, __LINE__), null);
	    }


	    
	    $numAddresses=0;
	    $numErased=0;
    	    for($i=0;$i<count($form['toAddress']);$i++) {
	        if (!empty($form['toAddress'][$i])) {
		    /* Only write real products to the module parameters */
		    $ret = GalleryCoreApi::setPluginParameter('module', 'checkoutnochex', 'toAddress'.$numAddresses, $form['toAddress'][$i]);
		    if ($ret) {
		        return array($ret->wrap(__FILE__, __LINE__), null);
		    }
		    if ($form['showCustomer'][$i]) {
		        $temp = 1;
		    } else {
		        $temp = 0;
		    }					
		    $ret = GalleryCoreApi::setPluginParameter('module', 'checkoutnochex', 'showCustomer'.$numAddresses, $temp);
		    if ($ret) {
		        return array($ret->wrap(__FILE__, __LINE__), null);
		    }					
		    if ($form['showThumbs'][$i]) {
		        $temp = 1;
		    } else {
		        $temp = 0;
		    }					
		    $ret = GalleryCoreApi::setPluginParameter('module', 'checkoutnochex', 'showThumbs'.$numAddresses, $temp);
		    if ($ret) {
		        return array($ret->wrap(__FILE__, __LINE__), null);
		    }					
		    if ($form['showLinks'][$i]) {
		        $temp = 1;
		    } else {
		        $temp = 0;
		    }					
		    $ret = GalleryCoreApi::setPluginParameter('module', 'checkoutnochex', 'showLinks'.$numAddresses, $temp);
		    if ($ret) {
		        return array($ret->wrap(__FILE__, __LINE__), null);
		    }
		    $numAddresses++;
		} else {
		    /* Explicitly erase whatever was previously set */
		    $ret = GalleryCoreApi::removePluginParameter('module', 'checkoutnochex', 'toAddress'.($numAddresses+$numErased));
		    if ($ret) {
		        return array($ret->wrap(__FILE__, __LINE__), null);
		    }
		    $ret = GalleryCoreApi::removePluginParameter('module', 'checkoutnochex', 'showCustomer'.($numAddresses+$numErased));
		    if ($ret) {
		        return array($ret->wrap(__FILE__, __LINE__), null);
		    }
		    $ret = GalleryCoreApi::removePluginParameter('module', 'checkoutnochex', 'showThumbs'.($numAddresses+$numErased));
		    if ($ret) {
		        return array($ret->wrap(__FILE__, __LINE__), null);
		    }
		    $ret = GalleryCoreApi::removePluginParameter('module', 'checkoutnochex', 'showLinks'.($numAddresses+$numErased));
		    if ($ret) {
		        return array($ret->wrap(__FILE__, __LINE__), null);
		    }
		    $numErased++;
		}
	    }
	    $ret = GalleryCoreApi::setPluginParameter('module', 'checkoutnochex', 'numAddresses', $numAddresses);
	    if ($ret) {
		return array($ret->wrap(__FILE__, __LINE__), null);
	    }

        list ($ret, $module) = GalleryCoreApi::loadPlugin('module', 'checkoutnochex');
        if ($ret) {
            return array($ret->wrap(__FILE__, __LINE__), null);
        }
        list ($ret, $isActive) = $module->isActive();
        if ($ret) {
            return array($ret->wrap(__FILE__, __LINE__), null);
        }

        $redirect['view'] = 'core.SiteAdmin';
        if ($isActive) {
            $redirect['subView'] = 'checkoutnochex.Admin';
            $status['saved'] = 1;
        } else {
            $redirect['subView'] = 'core.AdminModules';
            $status['configured'] = 'Checkout by MBookers';
        }

	} else if (isset($form['action']['cancel'])) {
	    $redirect['view'] = 'core.SiteAdmin';
	    $redirect['subView'] = 'checkoutnochex.Admin';
	}

	if (!empty($redirect)) {
	    $results['redirect'] = $redirect;
	} else {
	    $results['delegate']['view'] = 'core.SiteAdmin';
	    $results['delegate']['subView'] = 'checkoutnochex.Admin';
	}

	$results['status'] = $status;
	$results['error'] = $error;

	return array(null, $results);
    }
}

/**
 * @package checkoutnochex
 * @subpackage UserInterface
 */
class AdminView extends GalleryView {

    /**
     * @see GalleryView::loadTemplate
     */
    function loadTemplate(&$template, &$form) {
	global $gallery;
	$urlGenerator =& $gallery->getUrlGenerator();

        $user = $gallery->getActiveUser();
        $userdata = (array)$user;

	if ($form['formName'] != 'AdminCheckoutNoChex') {
	    $form['formName'] = 'AdminCheckoutNoChex'; 


	    list ($ret, $form['gendesc']) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'gendesc');
	    if ($ret) {
		return array($ret->wrap(__FILE__, __LINE__), null);
	    }
	    list ($ret, $form['gendet']) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'gendet');
	    if ($ret) {
		return array($ret->wrap(__FILE__, __LINE__), null);
	    }
	    list ($ret, $form['buynote']) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'buynote');
	    if ($ret) {
		return array($ret->wrap(__FILE__, __LINE__), null);
	    }
	    list ($ret, $form['fromAddress']) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'fromAddress');
	    if ($ret) {
	        return array($ret->wrap(__FILE__, __LINE__), null);
	    }
	    list ($ret, $form['subject']) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'subject');
	    if ($ret) {
	        return array($ret->wrap(__FILE__, __LINE__), null);
	    }

	    list ($ret, $numAddresses) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'numAddresses');
	    if ($ret) {
	        return array($ret->wrap(__FILE__, __LINE__), null);
	    }
	    for($i=0;$i<max(3, $numAddresses+1);$i++) {
	    	list ($ret, $form['toAddress'][$i]) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'toAddress'.$i);
		if ($ret) {
		    return array($ret->wrap(__FILE__, __LINE__), null);
		}					
	    	list ($ret, $temp) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'showCustomer'.$i);
		if ($ret) {
		    return array($ret->wrap(__FILE__, __LINE__), null);
		}
		if ($temp==1) {
		    $form['showCustomer'][$i] = true;
		} else {					
		    $form['showCustomer'][$i] = false;
		}
	    	list ($ret, $temp) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'showThumbs'.$i);
		if ($ret) {
		    return array($ret->wrap(__FILE__, __LINE__), null);
		}					
		if ($temp==1) {
		    $form['showThumbs'][$i] = true;
		} else {					
		    $form['showThumbs'][$i] = false;
		}
	    	list ($ret, $temp) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'showLinks'.$i);
		if ($ret) {
		    return array($ret->wrap(__FILE__, __LINE__), null);
		}					
		if ($temp==1) {
		    $form['showLinks'][$i] = true;
		} else {					
		    $form['showLinks'][$i] = false;
		}
	    }	    


	    list ($ret, $form['nochexname']) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'nochexname');
	    if ($ret) {
				return array($ret->wrap(__FILE__, __LINE__), null);
	    }
	    list ($ret, $form['fromAddress']) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'fromAddress');
	    if ($ret) {
	        return array($ret->wrap(__FILE__, __LINE__), null);
	    }
	    list ($ret, $form['subject']) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'subject');
	    if ($ret) {
	        return array($ret->wrap(__FILE__, __LINE__), null);
	    }

	    list ($ret, $numAddresses) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'numAddresses');
	    if ($ret) {
	        return array($ret->wrap(__FILE__, __LINE__), null);
	    }
	    for($i=0;$i<max(3, $numAddresses+1);$i++) {
	    	list ($ret, $form['toAddress'][$i]) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'toAddress'.$i);
		if ($ret) {
		    return array($ret->wrap(__FILE__, __LINE__), null);
		}					
	    	list ($ret, $temp) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'showCustomer'.$i);
		if ($ret) {
		    return array($ret->wrap(__FILE__, __LINE__), null);
		}
		if ($temp==1) {
		    $form['showCustomer'][$i] = true;
		} else {					
		    $form['showCustomer'][$i] = false;
		}
	    	list ($ret, $temp) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'showThumbs'.$i);
		if ($ret) {
		    return array($ret->wrap(__FILE__, __LINE__), null);
		}					
		if ($temp==1) {
		    $form['showThumbs'][$i] = true;
		} else {					
		    $form['showThumbs'][$i] = false;
		}
	    	list ($ret, $temp) = GalleryCoreApi::getPluginParameter('module', 'checkoutnochex', 'showLinks'.$i);
		if ($ret) {
		    return array($ret->wrap(__FILE__, __LINE__), null);
		}					
		if ($temp==1) {
		    $form['showLinks'][$i] = true;
		} else {					
		    $form['showLinks'][$i] = false;
		}
	    }	
            if (!isset($form['gendet'])) {
                $form['gendet'] = 'Images from ' . str_replace('/main.php','',$urlGenerator->generateUrl(array(), array('forceFullUrl' => true)));
            }
            if (!isset($form['buynote'])) {
                $form['buynote'] = 'Enjoy your purchase!';
            }
            if (!isset($form['nochexname'])) {
                $form['nochexname'] = $userdata['email'];  
            }
            if (!isset($form['fromAddress'])) {
                $form['fromAddress'] = $userdata['email']; 
            }	
            if (!isset($form['subject'])) {
                $form['subject'] = 'Your Order by NoChex at ' . str_replace('/main.php','',$urlGenerator->generateUrl(array(), array('forceFullUrl' => true)));
            }
	}

	$template->setVariable('controller', 'checkoutnochex.Admin');
	return array(null,
		     array('body' => 'modules/checkoutnochex/templates/Admin.tpl'));
    }
}
?>
