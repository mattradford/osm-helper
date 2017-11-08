<?php
/**
 * Plugin Name: OSM Helper
 * Plugin URI:  https://github.com/mattradford/osm-helper
 * Description: Interacts with the Online Scout Manager API. Pulls in section programmes.
 * Version:     1.0.0
 * Author:      mattrad
 * Author URI:  https://www.mattrad.uk
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: osm-helper
 * Domain Path: /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Autoloader callback.
 *
 * Converts a class name to a file path and requires it if it exists.
 *
 * @since 1.0.0
 *
 * @param string $class Class name.
 */
function structure_autoloader( $class ) {
	if ( 0 !== strpos( $class, 'Structure_' ) ) {
		return;
	}

	$file  = dirname( __FILE__ ) . '/classes/';
	$file .= str_replace( array( 'Structure_', '_' ), array( '', '/' ), $class );
	$file .= '.php';

	if ( file_exists( $file ) ) {
		require_once( $file );
	}
}
spl_autoload_register( 'structure_autoloader' );

/**
 * Retrieve the main plugin instance.
 *
 * @since 1.0.0
 *
 * @return Structure_Plugin
 */
function structure() {
	static $instance;

	if ( null === $instance ) {
		$instance = new Structure_Plugin();
	}

	return $instance;
}

// Set up the main plugin instance.
structure()->set_basename( plugin_basename( __FILE__ ) )
           ->set_directory( plugin_dir_path( __FILE__ ) )
           ->set_file( __FILE__ )
           ->set_slug( 'structure' )
           ->set_url( plugin_dir_url( __FILE__ ) );

// Register hook providers.
structure()->register_hooks( new Structure_Provider_I18n() );

// Load the plugin.
add_action( 'plugins_loaded', array( structure(), 'load_plugin' ) );
