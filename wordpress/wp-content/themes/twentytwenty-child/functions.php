<?php
//Everywhere he goes, he require a module
include_once( get_stylesheet_directory() .'/common/functions.common.php');
include_once( get_stylesheet_directory() .'/afishas/CPT.afisha.php');
include_once( get_stylesheet_directory() .'/banners/CPT.banner.php');
add_action( 'init', 'remove_my_action');
function remove_my_action() {
    remove_action( 'after_setup_theme', 'twentytwenty_block_editor_settings',100 );
}
