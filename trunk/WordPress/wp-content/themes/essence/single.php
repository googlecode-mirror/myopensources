<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

$post = $wp_query->post;
if ( in_category('3') ) {
	include(TEMPLATEPATH . '/single_event.php');
} else {
	include(TEMPLATEPATH . '/single_normal.php');
}
?>