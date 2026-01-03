# Changelog

## Version 0.2.1

- Improved Stripe override system with support for local `stripe-config.php` file
- Added explicit environment check for Cloudflare Turnstile bypass
- Updated documentation for new Stripe configuration options
- Fixed build directory tracking in git (.gitignore update)
- General documentation alignment across overview and AGENTS.md

## Version 0.2.0

- Added Stripe test API key overrides for local development
- Added Cloudflare Turnstile bypass filter for local testing
- Both features only activate in local environments (WP_ENVIRONMENT_TYPE === 'local')
- Security: Use environment constants for Stripe keys instead of hardcoded values

## Version 0.1.0 (Initial Release)

- Initial plugin release for Extra Chill Platform
- URL override system for local development environments
- Support for all 9 network sites with local URL mapping
- Environment type detection (local-only activation)
- No database modifications, filter-based approach
