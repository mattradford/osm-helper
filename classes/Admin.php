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
 * Admin plugin class.
 *
 * @package OSMHelper
 * @since   1.0.0
 */
class OSMHelper_Admin {
	/**
	 * Load the plugin.
	 *
	 * @since 1.0.0
	 */
	public function load_plugin() {
        add_action( 'admin_menu', array( $this, 'register_submenu') );
    }
    
	/**
	 * Register a submenu page unde Settings
	 *
	 * @since 1.0.0
	 */
	public function register_submenu() {
        
        add_submenu_page(
            'options-general.php',
            'OSM Helper',
            'OSM Helper',
            'manage_options',
            'osm-helper',
            'wpdocs_my_custom_submenu_page_callback' );
        
	}
}