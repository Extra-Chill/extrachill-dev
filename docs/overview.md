# Extra Chill Dev Tools - Overview

## Purpose & Scope

The Extra Chill Dev Tools plugin provides development environment-specific configurations for the WordPress multisite network. It enables developers to use local URLs while maintaining full multisite functionality in local development environments.

**Activation**: Network-activated (affects all network sites)

**Status**: Production-ready development utility

## When to Use

This plugin is essential for local WordPress development:

1. **Local Multisite Testing**: When developing locally with multisite enabled
2. **URL Mapping**: When local domain structure differs from production
3. **Cross-Site Navigation**: When testing multisite navigation locally
4. **Cross-Domain Links**: When verifying artist.extrachill.com → extrachill.link mapping locally

## Development Environments Supported

- **testing-grounds.local** - Standard LocalWP development setup
- **Custom Domains**: Can be configured for other local dev domains

## Key Features

- **Automatic URL Override**: Rewrites all site URLs to local equivalents
- **Stripe Test Keys**: Provides flexible test API key configuration for local development
- **Turnstile Bypass**: Automatically bypasses Cloudflare Turnstile verification locally
- **Environment Detection**: Only activates when `WP_ENVIRONMENT_TYPE === 'local'`
- **Multisite Support**: Handles all 9 network sites with proper URL mapping
- **No Production Impact**: Safe to leave network-activated; has zero effect on production

## Configured Local URLs

All 9 network sites map to subpaths under base `https://testing-grounds.local`:

| Site | Production URL | Local URL |
|------|---|---|
| Main | extrachill.com | https://testing-grounds.local |
| Community | community.extrachill.com | https://testing-grounds.local/community |
| Shop | shop.extrachill.com | https://testing-grounds.local/shop |
| Artist | artist.extrachill.com | https://testing-grounds.local/artist |
| Chat | chat.extrachill.com | https://testing-grounds.local/chat |
| Events | events.extrachill.com | https://testing-grounds.local/events |
| Stream | stream.extrachill.com | https://testing-grounds.local/stream |
| Newsletter | newsletter.extrachill.com | https://testing-grounds.local/newsletter |
| Docs | docs.extrachill.com | https://testing-grounds.local/docs |
| Horoscope | horoscope.extrachill.com | https://testing-grounds.local/horoscope |

## Architecture

### File Organization

```
extrachill-dev/
├── extrachill-dev.php          # Main plugin file, initialization
└── inc/
    └── core/
        ├── url-overrides.php       # URL override filter implementation
        ├── stripe-overrides.php    # Stripe test key overrides
        └── turnstile-overrides.php # Turnstile bypass implementation
```

### Loading Pattern

- Main plugin file includes all three override handlers
- URL override uses `ec_site_url_override` filter
- Stripe override provides test API keys via filter or local config
- Turnstile override bypasses captcha verification
- All overrides only activate when `WP_ENVIRONMENT_TYPE === 'local'`

## Customization

### Change Local Base Domain

Edit `inc/core/url-overrides.php`:

```php
// Replace 'testing-grounds.local' with your local domain
$local_base = 'https://your-local-domain.test';
```

### Add New Site URL

Add entry to `$local_paths` array in `url-overrides.php`:

```php
$local_paths = array(
    'main'       => '/',
    'community'  => '/community/',
    'new_site'   => '/new-path/',
    // ... etc
);
```

### Disable for Testing

Temporarily disable by adding to wp-config.php:

```php
define('WP_ENVIRONMENT_TYPE', 'development'); // Not 'local', so plugin won't activate
```

## How It Works

1. **Environment Check**: Plugin verifies `WP_ENVIRONMENT_TYPE === 'local'`
2. **Hook Installation**: Registers filter on `ec_site_url_override` hook
3. **URL Mapping**: When site URL requested, returns local equivalent
4. **Transparent Operation**: All WordPress functions using `get_home_url()` return local URL
5. **No Code Changes**: Developers don't need to change code for local/production

## Security

- **Local-Only**: Filter only activates in local environment type
- **No Credentials**: No API keys or secrets in code
- **No Database Changes**: Purely filter-based, no persistent storage
- **Safe for Production**: If accidentally left active, has no effect unless `WP_ENVIRONMENT_TYPE=local`

## Common Use Cases

### Cross-Site Navigation Testing

Test multisite navigation locally:
```
https://testing-grounds.local/ → artist.extrachill.com link
→ https://testing-grounds.local/artist/
```

### Testing Domain Mapping

Verify artist.extrachill.link mapping works in local environment using artist blog URLs

### Cross-Domain Authentication Testing

WordPress multisite native cookies work across both main domain and subpath sites

## Troubleshooting

### URLs Still Show Production Domain

1. Verify `WP_ENVIRONMENT_TYPE = 'local'` in wp-config.php
2. Check plugin is network-activated
3. Verify base domain in `url-overrides.php` matches local setup
4. Clear WordPress cache if using object cache

### Plugin Not Activating

Verify environment variable is exactly `'local'`:

```php
define('WP_ENVIRONMENT_TYPE', 'local'); // Must be this exact value
```

Not: `'development'`, `'staging'`, `'testing'`, etc.

### Specific Site URL Wrong

Edit `url-overrides.php` and verify path mapping matches local multisite setup

## Related Documentation

- AGENTS.md: Plugin development patterns
- README.md: User-facing documentation
