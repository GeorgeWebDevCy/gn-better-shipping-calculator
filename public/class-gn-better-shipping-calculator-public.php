<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.georgenicolaou.me/
 * @since      1.0.0
 *
 * @package    Gn_Better_Shipping_Calculator
 * @subpackage Gn_Better_Shipping_Calculator/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Gn_Better_Shipping_Calculator
 * @subpackage Gn_Better_Shipping_Calculator/public
 * @author     George Nicolaou <orionas.elite@gmail.com>
 */
class Gn_Better_Shipping_Calculator_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Gn_Better_Shipping_Calculator_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Gn_Better_Shipping_Calculator_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/gn-better-shipping-calculator-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Gn_Better_Shipping_Calculator_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Gn_Better_Shipping_Calculator_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/gn-better-shipping-calculator-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Override the WooCommerce shipping calculator template with the plugin version.
	 *
	 * @since 1.0.0
	 *
	 * @param string $template      Located template path.
	 * @param string $template_name Requested template name.
	 * @param string $template_path Template path from WooCommerce.
	 *
	 * @return string
	 */
	public function override_shipping_calculator_template( $template, $template_name, $template_path ) {
		if ( 'cart/shipping-calculator.php' !== $template_name ) {
			return $template;
		}

		$plugin_template = plugin_dir_path( __DIR__ ) . 'woocommerce/cart/shipping-calculator.php';

		if ( file_exists( $plugin_template ) ) {
			return $plugin_template;
		}

		return $template;
	}

	/**
	 * Sanitize and persist custom address fields when calculating shipping.
	 *
	 * @since 1.0.0
	 *
	 * @param array $address Shipping address being processed.
	 *
	 * @throws Exception When address line 1 is empty.
	 *
	 * @return array
	 */
	public function handle_cart_shipping_address( $address ) {
		$address_1 = isset( $_POST['calc_shipping_address_1'] ) ? wc_clean( wp_unslash( $_POST['calc_shipping_address_1'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Missing
		$address_2 = isset( $_POST['calc_shipping_address_2'] ) ? wc_clean( wp_unslash( $_POST['calc_shipping_address_2'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Missing

		if ( '' === $address_1 ) {
			throw new Exception( __( 'Address line 1 is required.', 'gn-better-shipping-calculator' ) );
		}

		if ( function_exists( 'WC' ) && WC()->customer ) {
			WC()->customer->set_shipping_address_1( $address_1 );
			WC()->customer->set_shipping_address_2( $address_2 );
		}

		$address['address_1'] = $address_1;
		$address['address_2'] = $address_2;

		return $address;
	}

}
