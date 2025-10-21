# GN Better Shipping Calculator

GN Better Shipping Calculator replaces the default WooCommerce shipping calculator with an improved experience that
captures accurate address information before estimating rates. It ships with its own template, styles, and scripts so
you can deliver a frictionless checkout experience.

## Features

- Overrides `cart/shipping-calculator.php` with the plugin's enhanced template.
- Requires Address Line 1 to prevent incomplete shipping calculations.
- Persists Address Line 1 and Address Line 2 to the WooCommerce customer profile.
- Enqueues dedicated CSS and JavaScript assets that you can customize or override from your theme.

## Installation

1. Download or clone this repository into your WordPress installation's `wp-content/plugins` directory.
2. Activate **GN Better Shipping Calculator** from the WordPress admin Plugins screen.
3. Visit the WooCommerce cart page to use the enhanced shipping calculator.

## Frequently Asked Questions

### Will this plugin work with my theme?
Yes. The template override uses WooCommerce's standard template loading process, so any theme that supports the default
shipping calculator will work out of the box.

### Can I customize the layout or styles?
Absolutely. Copy the template in `woocommerce/cart/shipping-calculator.php` to your theme if you need deeper changes, or
override the enqueued styles/scripts using your own assets.

## Contributing

Pull requests are welcome. Please open an issue describing the change you would like to make before submitting larger
updates.

## Author

Maintained by George Nicolaou (WordPress.org: [orionaselite](https://profiles.wordpress.org/orionaselite/)).
