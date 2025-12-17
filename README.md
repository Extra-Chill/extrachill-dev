# Extra Chill Dev Tools

Development environment overrides for the Extra Chill Platform.

## Purpose

This plugin provides URL overrides for local development environments, allowing the platform's navigation system to work correctly with local subdirectory multisite setups.

## Usage

1. Customize the `$local_base` and `$local_paths` arrays in `inc/core/url-overrides.php` for your local environment
2. Network activate the plugin
3. The `ec_get_site_url()` function will now return local URLs instead of production domains

## Environment Detection

The plugin only activates overrides when `WP_ENVIRONMENT_TYPE === 'local'` is defined.

## Configuration

### URL Overrides
Modify the URL mappings in `inc/core/url-overrides.php` to match your local setup:

```php
$local_base = 'https://your-local-domain.com';
$local_paths = array(
    'main' => '/',
    'community' => '/community/',
    // ... etc
);
```

### Stripe Test Keys
Stripe test API keys are provided out-of-the-box for local development. No configuration required.

### Turnstile Bypass
The Turnstile verification is automatically bypassed in local environments.