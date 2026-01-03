# Extra Chill Dev Tools Plugin

WordPress plugin providing development environment overrides for the Extra Chill Platform multisite network.

## Overview

**Plugin Name**: Extra Chill Dev Tools
**Version**: 0.2.1
**Network**: true (network-activated)
**Purpose**: Development environment URL overrides for local development

## Core Features

### URL Override System
- Provides local development URL overrides for multisite network sites
- Only active in local environments (`WP_ENVIRONMENT_TYPE === 'local'`)
- Allows developers to use custom local URLs for testing multisite functionality
- Integrates with `ec_site_url_override` filter for seamless URL management

### Local Development Configuration
- Base URL: `https://testing-grounds.local`
- Path mappings for all network sites:
  - Main site: `/`
  - Community: `/community/`
  - Shop: `/shop/`
  - Artist: `/artist/`
  - Chat: `/chat/`
  - Events: `/events/`
  - Stream: `/stream/`
  - Newsletter: `/newsletter/`
  - Docs: `/docs/`
  - Horoscope: `/horoscope/`

### Additional Development Overrides

#### Stripe Test API Keys
- Provides flexible test API key configuration for local development
- Supports local config file (gitignored), wp-config constants, or placeholder fallbacks
- Only active in local environments

#### Cloudflare Turnstile Bypass
- Bypasses Turnstile verification for local development
- Automatically enabled when `WP_ENVIRONMENT_TYPE === 'local'`
- Allows testing forms without CAPTCHA requirements

## Architecture

### File Organization
- **extrachill-dev.php** - Main plugin file with initialization
- **inc/core/url-overrides.php** - URL override filter implementation
- **inc/core/stripe-overrides.php** - Stripe test key overrides
- **inc/core/turnstile-overrides.php** - Turnstile bypass implementation

### Loading Pattern
- Direct `require_once` include for core functionality
- Conditional activation based on environment type
- Filter-based integration with existing URL resolution system

## Development Usage

This plugin is automatically activated in local development environments to provide proper URL resolution for multisite testing. No additional configuration is required for URL overrides - it works transparently with the existing `ec_site_url_override` filter system.

For Stripe testing, define your test API keys in `wp-config.php` as described above. Turnstile verification is automatically bypassed in local environments.

## Security Notes

- Only active in local environments
- No impact on production deployments
- Safe to leave network-activated in all environments</content>
<parameter name="filePath">extrachill-plugins/extrachill-dev/AGENTS.md