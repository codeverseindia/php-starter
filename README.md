# LightPHP App Starter

A minimal, server-rendered PHP 8.5 application starter built on `codeverseindia/lightphp-core`. It provides a welcome page, explicit routing, and a private writable directory—no travel-specific features or frontend framework.

## Requirements

- PHP 8.5+ with cURL and JSON extensions
- Composer 2

## Setup

```sh
composer install
test -f .env || cp .env.example .env
php spark serve
```

Open `http://localhost:8080`. If `.env` already exists, keep it and update only the values you need.

This repository is the starter source. After it is published on Packagist, create a new project with:

```sh
composer create-project codeverseindia/php-starter my-app
```

## Commands

```sh
php spark help
php spark routes
php spark doctor
php spark serve --port=8081
composer test
```

The development server binds to loopback by default. `--host=<IP>` is available for intentional development-only network binding.

## Structure

- `app/Config/app.php` — application name, environment, storage, and security headers.
- `app/Controllers/HomeController.php` — the welcome page controller.
- `app/Views/pages/welcome.php` — the starter welcome page.
- `config/route.php` — explicit client route registration.
- `public/` — the only web document root.
- `writable/` — private cache and log storage.

Add client controllers and views in `app/`, then register routes explicitly in `config/route.php`. Use `e()` for dynamic HTML output. Do not copy Core source into this project or edit files in `vendor/`.

## Deployment

Configure the web server document root as `project-root/public/`. `public_html` is a symlink to `public/` for shared hosts that require that directory name; the host must allow symlink traversal. Never expose the repository root, `.env`, `vendor/`, or `writable/`.

Set `APP_ENV=production`, `APP_DEBUG=false`, a correct HTTPS `APP_URL`, and a valid timezone. Keep `writable/cache` and `writable/logs` private and writable by the PHP-FPM/Apache user.
