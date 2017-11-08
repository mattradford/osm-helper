<?php
/**
 * Plugin Name: OSM Helper
 * Plugin URI:  https://github.com/mattradford/osm-helper
 * Description: Show section programmes from your Online Scout Manager account on your WordPress site.
 * Version:     0.0.1
 * Author:      mattrad
 * Author URI:  https://www.mattrad.uk
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: osmhelper
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
function osmhelper_autoloader( $class ) {
	if ( 0 !== strpos( $class, 'OSMHelper_' ) ) {
		return;
	}

	$file  = dirname( __FILE__ ) . '/classes/';
	$file .= str_replace( array( 'OSMHelper_', '_' ), array( '', '/' ), $class );
	$file .= '.php';

	if ( file_exists( $file ) ) {
		require_once( $file );
		// echo $file;
	}
}
spl_autoload_register( 'osmhelper_autoloader' );

/**
 * Retrieve the main plugin instance.
 *
 * @since 1.0.0
 *
 * @return OSMHelper_Plugin
 */
function osmhelper() {
	static $instance;

	if ( null === $instance ) {
		$instance = new OSMHelper_Plugin();
	}

	return $instance;
}

// Set up the main plugin instance.
osmhelper()->set_basename( plugin_basename( __FILE__ ) )
           ->set_directory( plugin_dir_path( __FILE__ ) )
           ->set_file( __FILE__ )
           ->set_slug( 'osmhelper' )
           ->set_url( plugin_dir_url( __FILE__ ) );

// Register hook providers.
osmhelper()->register_hooks( new OSMHelper_Provider_I18n() );

// Load the plugin.
add_action( 'plugins_loaded', array( osmhelper(), 'load_plugin' ) );
