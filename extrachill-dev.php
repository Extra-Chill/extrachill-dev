<?php
/**
 * Plugin Name: Extra Chill Dev Tools
 * Description: Development environment overrides for Extra Chill Platform
 * Version: 0.2.2
 * Author: Chris Huber
 * Network: true
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'EXTRACHILL_DEV_PLUGIN_DIR' ) ) {
    define( 'EXTRACHILL_DEV_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

require_once EXTRACHILL_DEV_PLUGIN_DIR . 'inc/core/analytics-overrides.php';
require_once EXTRACHILL_DEV_PLUGIN_DIR . 'inc/core/url-overrides.php';
require_once EXTRACHILL_DEV_PLUGIN_DIR . 'inc/core/stripe-overrides.php';
require_once EXTRACHILL_DEV_PLUGIN_DIR . 'inc/core/turnstile-overrides.php';