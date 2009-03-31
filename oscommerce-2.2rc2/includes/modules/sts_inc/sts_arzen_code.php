<?php
$sts->restart_capture();
include(DIR_WS_BOXES . 'ul_categories.php');
$sts->restart_capture ('ul_categorybox', 'box');

$sts->restart_capture();
include(DIR_WS_BOXES . 'ul_information.php');
$sts->restart_capture ('ul_information_box', 'box');

?>