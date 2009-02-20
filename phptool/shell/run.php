<?php
$application_path = dirname(__FILE__) ;

//----- set include path ------
$path = array(
    get_include_path(),
    $application_path,
    );
set_include_path( implode(PATH_SEPARATOR, $path) );
unset($path, $application_path);

include_once 'Application/Controller.php';

Application_Controller::getInstance()->main();
?>