<?php

/**
 * SocialN - Social Notifications
 *
 * @link              https://socialn.io
 * @since             1.0.0
 * @package           SocialN
 *
 * @wordpress-plugin
 * Plugin Name:       SocialN - Social Notifications
 * Plugin URI:        https://wordpress.org/plugins/socialn/
 * Description:       This plugin helps you to set SocialN <socialn.io> up in your wordpress website, easily.
 * Version:           1.0.0
 * Author:            Alfaron
 * Author URI:		  https://alfaron.com.tr
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       socialn
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SOCIALN_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-socialn-activator.php
 */
function activate_socialn() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-socialn-activator.php';
	Socialn_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-socialn-deactivator.php
 */
function deactivate_socialn() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-socialn-deactivator.php';
	Socialn_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_socialn' );
register_deactivation_hook( __FILE__, 'deactivate_socialn' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-socialn.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_socialn() {

	$plugin = new Socialn();
	$plugin->run();

}
run_socialn();
