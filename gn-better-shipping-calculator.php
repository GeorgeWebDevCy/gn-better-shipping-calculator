<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.georgenicolaou.me/
 * @since             1.0.0
 * @package           Gn_Better_Shipping_Calculator
 *
 * @wordpress-plugin
 * Plugin Name:       GN Better Shipping Calculator
 * Plugin URI:        https://www.georgenicolaou.me/plugins/gn-better-shipping-calculator
 * Description:       It a better woocommerce shipping calculator for WooCommece
 * Version:           1.0.1
 * Author:            George Nicolaou (orionaselite)
 * Author URI:        https://profiles.wordpress.org/orionaselite/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gn-better-shipping-calculator
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
define( 'GN_BETTER_SHIPPING_CALCULATOR_VERSION', '1.0.1' );

require __DIR__ . '/vendor/autoload.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-gn-better-shipping-calculator-activator.php
 */
function activate_gn_better_shipping_calculator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gn-better-shipping-calculator-activator.php';
	Gn_Better_Shipping_Calculator_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-gn-better-shipping-calculator-deactivator.php
 */
function deactivate_gn_better_shipping_calculator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gn-better-shipping-calculator-deactivator.php';
	Gn_Better_Shipping_Calculator_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_gn_better_shipping_calculator' );
register_deactivation_hook( __FILE__, 'deactivate_gn_better_shipping_calculator' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-gn-better-shipping-calculator.php';

$gn_better_shipping_calculator_update_checker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/GeorgeWebDevCy/gn-better-shipping-calculator/',
	__FILE__,
	'gn-better-shipping-calculator'
);

$gn_better_shipping_calculator_update_branch = getenv( 'GN_BETTER_SHIPPING_CALCULATOR_UPDATE_BRANCH' );
if ( empty( $gn_better_shipping_calculator_update_branch ) ) {
	$gn_better_shipping_calculator_update_branch = 'main';
}
$gn_better_shipping_calculator_update_checker->setBranch( $gn_better_shipping_calculator_update_branch );

$gn_better_shipping_calculator_auth_token = getenv( 'GN_BETTER_SHIPPING_CALCULATOR_UPDATE_AUTH_TOKEN' );
if ( ! empty( $gn_better_shipping_calculator_auth_token ) ) {
	$gn_better_shipping_calculator_update_checker->setAuthentication( $gn_better_shipping_calculator_auth_token );
}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_gn_better_shipping_calculator() {

	$plugin = new Gn_Better_Shipping_Calculator();
	$plugin->run();

}
run_gn_better_shipping_calculator();
