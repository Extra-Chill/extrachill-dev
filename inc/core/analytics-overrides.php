<?php
/**
 * Google Tag Manager Development Bypass
 *
 * Disables GTM in local development to prevent polluting production analytics.
 *
 * @package ExtraChill\Dev
 */

defined( 'ABSPATH' ) || exit;

if ( defined( 'WP_ENVIRONMENT_TYPE' ) && WP_ENVIRONMENT_TYPE === 'local' ) {
	add_filter( 'extrachill_disable_gtm', '__return_true' );
}
