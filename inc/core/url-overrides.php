<?php
/**
 * Development environment URL overrides
 */

add_filter( 'ec_site_url_override', 'extrachill_dev_site_url_override', 10, 3 );

function extrachill_dev_site_url_override( $override_url, $key, $blog_id ) {
    // Only override in local environment
    if ( ! defined( 'WP_ENVIRONMENT_TYPE' ) || WP_ENVIRONMENT_TYPE !== 'local' ) {
        return $override_url;
    }

    // Customize these for your local setup
    $local_base = 'https://testing-grounds.local';
    $local_paths = array(
        'main'       => '/',
        'community'  => '/community/',
        'shop'       => '/shop/',
        'artist'     => '/artist/',
        'chat'       => '/chat/',
        'events'     => '/events/',
        'stream'     => '/stream/',
        'newsletter' => '/newsletter/',
        'docs'       => '/docs/',
        'horoscope'  => '/horoscope/',
    );

    if ( isset( $local_paths[ $key ] ) ) {
        return $local_base . $local_paths[ $key ];
    }

    return $override_url;
}