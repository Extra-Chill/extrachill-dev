<?php
/**
 * Turnstile Development Bypass
 *
 * Bypasses Cloudflare Turnstile verification for local development.
 *
 * @package ExtraChill\Dev
 */

defined( 'ABSPATH' ) || exit;

add_filter( 'extrachill_bypass_turnstile_verification', '__return_true' );
