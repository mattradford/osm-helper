<?php
/**
 * Main plugin.
 *
 * @package   OSM Helper
 * @copyright Copyright (c) 2017, mattrad
 * @license   GPL-2.0+
 * @since     1.0.0
 */

 /**
 * if uninstall.php is not called by WordPress, die
 *
 * @package OSMHelper
 * @since   1.0.0
 */
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
 
$option_name = 'wporg_option';
 
delete_option($option_name);