<?php
/**
 * Stripe Test Key Overrides for Local Development
 *
 * Provides test API keys for Stripe integration when running in local environment.
 * Only active when WP_ENVIRONMENT_TYPE is set to 'local'.
 *
 * This file first checks for a local config file (inc/core/stripe-config.php) that contains
 * actual test keys. If found, it uses those keys. Otherwise, it falls back to placeholder
 * values that allow the plugin to function but won't work for actual Stripe testing.
 *
 * This design allows developers to:
 * 1. Use real test keys by creating stripe-config.php locally (recommended for full testing)
 * 2. Modify wp-config.php with EXTRACHILL_DEV_STRIPE_* constants
 * 3. Use placeholders for basic plugin functionality without Stripe integration
 *
 * The stripe-config.php file is gitignored to keep secrets out of the repository.
 *
 * @package ExtraChillDev
 * @since 0.2.0
 */

defined( 'ABSPATH' ) || exit;

// Load local config file if it exists
$local_config = EXTRACHILL_DEV_PLUGIN_DIR . 'inc/core/stripe-config.php';
if (file_exists($local_config)) {
    require_once $local_config;
}

add_filter( 'extrachill_stripe_secret_key', 'extrachill_dev_stripe_secret_key' );

function extrachill_dev_stripe_secret_key( $key ) {
	if ( ! defined( 'WP_ENVIRONMENT_TYPE' ) || WP_ENVIRONMENT_TYPE !== 'local' ) {
		return $key;
	}
	global $extrachill_dev_stripe_secret_key;
	return $extrachill_dev_stripe_secret_key ?? 'sk_test_PLACEHOLDER_KEY';
}

add_filter( 'extrachill_stripe_publishable_key', 'extrachill_dev_stripe_publishable_key' );

function extrachill_dev_stripe_publishable_key( $key ) {
	if ( ! defined( 'WP_ENVIRONMENT_TYPE' ) || WP_ENVIRONMENT_TYPE !== 'local' ) {
		return $key;
	}
	global $extrachill_dev_stripe_publishable_key;
	return $extrachill_dev_stripe_publishable_key ?? 'pk_test_PLACEHOLDER_KEY';
}

add_filter( 'extrachill_stripe_webhook_secret', 'extrachill_dev_stripe_webhook_secret' );

function extrachill_dev_stripe_webhook_secret( $key ) {
	if ( ! defined( 'WP_ENVIRONMENT_TYPE' ) || WP_ENVIRONMENT_TYPE !== 'local' ) {
		return $key;
	}
	global $extrachill_dev_stripe_webhook_secret;
	return $extrachill_dev_stripe_webhook_secret ?? '';
}