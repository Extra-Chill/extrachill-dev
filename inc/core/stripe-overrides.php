<?php
/**
 * Stripe Test Key Overrides for Local Development
 *
 * Provides test API keys for Stripe integration when running in local environment.
 * Only active when WP_ENVIRONMENT_TYPE is set to 'local'.
 *
 * @package ExtraChillDev
 * @since 0.1.0
 */

defined( 'ABSPATH' ) || exit;

add_filter( 'extrachill_stripe_secret_key', 'extrachill_dev_stripe_secret_key' );

function extrachill_dev_stripe_secret_key( $key ) {
	if ( ! defined( 'WP_ENVIRONMENT_TYPE' ) || WP_ENVIRONMENT_TYPE !== 'local' ) {
		return $key;
	}
	return defined( 'EXTRACHILL_DEV_STRIPE_SECRET_KEY' ) ? EXTRACHILL_DEV_STRIPE_SECRET_KEY : 'sk_test_PLACEHOLDER_KEY';
}

add_filter( 'extrachill_stripe_publishable_key', 'extrachill_dev_stripe_publishable_key' );

function extrachill_dev_stripe_publishable_key( $key ) {
	if ( ! defined( 'WP_ENVIRONMENT_TYPE' ) || WP_ENVIRONMENT_TYPE !== 'local' ) {
		return $key;
	}
	return defined( 'EXTRACHILL_DEV_STRIPE_PUBLISHABLE_KEY' ) ? EXTRACHILL_DEV_STRIPE_PUBLISHABLE_KEY : 'pk_test_PLACEHOLDER_KEY';
}

add_filter( 'extrachill_stripe_webhook_secret', 'extrachill_dev_stripe_webhook_secret' );

function extrachill_dev_stripe_webhook_secret( $key ) {
	if ( ! defined( 'WP_ENVIRONMENT_TYPE' ) || WP_ENVIRONMENT_TYPE !== 'local' ) {
		return $key;
	}
	// Webhook secret is optional for local testing.
	// Set this if you're using Stripe CLI to forward webhooks locally.
	return '';
}
