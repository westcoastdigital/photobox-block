<?php

/*

Plugin Name: Headway Photobox Block

Plugin URI: http://www.jonmather.info

Description: Photobox block for Headway

Version: 1.0

Author: Jon Mather

Author URI: http://www.jonmather.info

License: GNU GPL v2

*/



define('PHOTOBOX_BLOCK_VERSION', '2.0');



add_action('after_setup_theme', 'register_photobox_block');

function register_photobox_block() {



	require_once 'photobox-block.php';

	require_once 'photobox-block-options.php';



	return headway_register_block('HeadwayPhotoboxBlock', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));



}



add_action('init', 'example_block_extend_updater');

function example_block_extend_updater() {

    if ( !class_exists('HeadwayUpdaterAPI') )

		return;

	$updater = new HeadwayUpdaterAPI(array(

		'slug' => 'photobox-block',

		'path' => plugin_basename(__FILE__),

		'name' => 'Photobox Block',

		'type' => 'block',

		'current_version' => PHOTOBOX_BLOCK_VERSION

	));

}
