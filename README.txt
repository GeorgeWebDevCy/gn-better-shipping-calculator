=== GN Better Shipping Calculator ===
Contributors: orionaselite
Donate link: https://www.georgenicolaou.me/
Tags: woocommerce, shipping, calculator, checkout, address
Requires at least: 5.6
Tested up to: 6.5
Requires PHP: 7.4
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Improve the WooCommerce shipping calculator with required address fields and a better customer experience.

== Description ==

GN Better Shipping Calculator replaces the default WooCommerce shipping calculator with an enhanced version that captures more accurate customer information before estimating rates. The plugin ships with its own template and ensures that required address details are stored on the WooCommerce customer object, providing reliable shipping quotes on the cart page.

**Key features**

* Overrides the standard `cart/shipping-calculator.php` template with an improved layout bundled with the plugin.
* Requires Address Line 1 before a quote can be calculated, preventing incomplete submissions.
* Persists Address Line 1 and Address Line 2 to the WooCommerce customer record so the information is available for the next steps in checkout.
* Loads custom styles and scripts that are scoped to the calculator for easy front-end customization.

== Installation ==

1. Upload the `gn-better-shipping-calculator` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the **Plugins** menu in WordPress.
1. Visit the WooCommerce cart page to use the improved shipping calculator.

== Frequently Asked Questions ==

= Does this plugin work with my existing theme? =

Yes. The calculator template is loaded through the standard WooCommerce template override system, so it works with any theme that supports the default shipping calculator.

= Can I customize the calculator styles? =

Absolutely. The plugin enqueues its own stylesheet and script handles that you can dequeue, override, or extend via your theme or a custom plugin.

== Screenshots ==

1. Enhanced shipping calculator on the WooCommerce cart page.

== Changelog ==

= 1.0.1 =
* Require Address Line 1 when calculating shipping to avoid incomplete address submissions.

= 1.0.0 =
* Initial public release of the improved WooCommerce shipping calculator.

== Upgrade Notice ==

= 1.0.1 =
Address Line 1 is now required for shipping calculations to ensure accurate results.
