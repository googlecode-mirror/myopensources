<?php

class UserDataModule extends GalleryModule {

    function UserDataModule() {
	global $gallery;

	$this->setId('userdata');
	$this->setName($gallery->i18n('User Profile Data'));
	$this->setDescription($gallery->i18n('Create aditional user profile data fields'));
	$this->setVersion('0.0.2');
	$this->setGroup('data', $gallery->i18n('Extra Data'));
	$this->setCallbacks('getSiteAdminViews|getUserAdminViews');
	$this->setRequiredCoreApi(array(7, 10));
	$this->setRequiredModuleApi(array(3, 0));
    }

    /**
     * @see GalleryModule::upgrade
     */
    function upgrade($currentVersion) {
        global $gallery;

	if (!isset($currentVersion)) {
	    $currentVersion = '0';
	}
      
        switch ($currentVersion) {
	    case '0':
	        $storage =& $gallery->getStorage();
	        $ret = $storage->configureStore($this->getId(), array('UserDataMap:1.0'));
	        if ($ret) { echo 'error at configureStore'; return $ret; }
	        
            break;
            case 'end of upgrade path':
            break;
        
            default:
	        return GalleryCoreApi::error(ERROR_BAD_PLUGIN, __FILE__, __LINE__,
					 sprintf('Unknown module version %s', $currentVersion));        

        }

	foreach (array('allowUserData' => 1) as $key => $value) {
	    $ret = $this->setParameter($key, $value);
	    if ($ret) { return $ret; }
	}
	    return null;
    }

    function uninstall() {
	    global $gallery;
	    GalleryCoreApi::requireOnce('modules/userdata/classes/UserDataHelper.class');

	    /* Delete all fields */
	    $query = ' SELECT [UserDataMap::userId] FROM [UserDataMap]';

      
	    list ($ret, $searchResults) = $gallery->search($query, array());
	    if ($ret) { return $ret; }
	    while ($result = $searchResults->nextResult()) {
	    	$ret = GalleryCoreApi::removeMapEntry('UserDataMap', array('userId' => (int)$result[0]));
	      if ($ret) { return array($ret, null); }
	    }

	    $ret = parent::uninstall();
	    if ($ret) { return $ret; }
	    return null;
    }

    /**
     * @see GalleryModule::registerEventListeners
     */
    function registerEventListeners() {
	GalleryCoreApi::requireOnce('modules/userdata/classes/UserDataHelper.class');
	GalleryCoreApi::registerEventListener('GalleryEntity::delete', new UserDataHelper());
    }

    /**
     * @see GalleryModule::getSiteAdminViews
     */
    function getSiteAdminViews() {
	return array(null,
		     array(array('name' => $this->translate('User Profile Data'),
				 'view' => 'userdata.UserDataSiteAdmin')));
    }

    /**
     * @see GalleryModule::getUserAdminViews
     */
    function getUserAdminViews($user) {
        global $gallery;

      	list ($ret, $isAnonymous) = GalleryCoreApi::isAnonymousUser($user->getId());
	      if ($ret) { return array($ret, null); }
	      list ($ret, $isOn) = $this->getParameter('allowUserData');
	      if ($ret) { return array($ret, null); }

        $user = $gallery->getActiveUser();

	      $views = array();
	      if ($isOn && !$isAnonymous && !$user->isLocked()) {
	        $views[] = array('name' => $this->translate('User Profile Data '),
			                     'view' => 'userdata.UserData');
	      }

	      return array(null, $views);
    }


    /**
     * @see GalleryModule::performFactoryRegistrations
     */
    function performFactoryRegistrations() {

	/* Register interface implementation */
	$ret = GalleryCoreApi::registerFactoryImplementation(
	    'UserDataInterface_1_0', 'UserDataHelper', 'UserData',
	    'modules/userdata/classes/UserDataHelper.class', 'userdata', null);
	if ($ret) {
	    return $ret;
	}

	$ret = GalleryCoreApi::registerFactoryImplementation(
	    'GallerySearchInterface_1_0', 'UserDataSearch', 'userdata',
	    'modules/userdata/classes/UserDataSearch.class', 'userdata', null);
	if ($ret) {
	    return $ret;
	}



	return null;
    }
}
?>
