<?php
/*
 Plugin Name:       TypedJs
 Plugin URI:        https://github.com/Brennii96/TypedJs
 Description:       This is a small plugin which allows you to use Typed JS when you put text between the shortcode [typedjs]Content[/typedjs]. Based on the code by Matt Boldt.
 Version:           1.2.0
 Author:            Brendan O'Neill
 Author URI:        https://github.com/Brennii96/
 License:           GPL-2.0+
 License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 Text Domain:       typed-js
 Domain Path:       /languages/
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.2.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TYPED_JS_VERSION', '1.2.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-typed-js-activator.php
 */
function activate_typed_js() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-typed-js-activator.php';
	Typed_Js_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-typed-js-deactivator.php
 */
function deactivate_typed_js() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-typed-js-deactivator.php';
	Typed_Js_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_typed_js' );
register_deactivation_hook( __FILE__, 'deactivate_typed_js' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-typed-js.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.2.0
 */
function run_typed_js() {

	$plugin = new Typed_Js();
	$plugin->run();

}
run_typed_js();
