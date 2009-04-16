<?php

GalleryCoreApi::requireOnce('modules/userdata/classes/UserDataHelper.class');

/**
 * Settings for userdata
 * @package UserData
 * @subpackage AdminInterface
 * @author Serban Constantinescu <serban.constantinescu@gmail.com>
 * @version $Revision: 15513 $
 */
class UserDataSiteAdminController extends GalleryController {

    /**
     * @see GalleryController::handleRequest
     */
    function handleRequest($form) {
	/* Make sure we have adequate permissions */
	$ret = GalleryCoreApi::assertUserIsSiteAdministrator();
	if ($ret) {
	    return array($ret, null);
	}

	list ($ret, $status) = UserDataHelper::handleAdminAction($form);
	if ($ret) {
	    return array($ret, null);
	}

	/* Figure out where to redirect upon success */
	$results['redirect']['view'] = 'core.SiteAdmin';
	$results['redirect']['subView'] = 'userdata.UserDataSiteAdmin';
	$results['status'] = $status;
	$results['error'] = array();

	return array(null, $results);
    }
}

/**
 * Settings for custom fields
 */
class UserDataSiteAdminView extends GalleryView {

    /**
     * @see GalleryView::loadTemplate
     */
    function loadTemplate(&$template, &$form) {
	$ret = GalleryCoreApi::assertUserIsSiteAdministrator();
	if ($ret) {
	    return array($ret, null);
	}

	if ($form['formName'] != 'UserDataSiteAdmin') {
	    $form['formName'] = 'UserDataSiteAdmin';

	    $ret = UserDataHelper::loadAdminForm($form);
	    if ($ret) {
		return array($ret, null);
	    }
	}
	$template->setVariable('controller', 'userdata.UserDataSiteAdmin');
	return array(null,
		     array('body' => 'modules/userdata/templates/UserDataSiteAdmin.tpl'));
    }
}
?>
