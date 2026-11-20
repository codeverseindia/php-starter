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
- `app/Controllers/` — page controllers, including Home, About, and Contact.
- `app/Views/pages/` — server-rendered welcome, About, and Contact pages.
- `config/route.php` — explicit client route registration.
- `public/` — the only web document root.
- `writable/` — private cache and log storage.

Add client controllers and views in `app/`, then register routes explicitly in `config/route.php`. Use `e()` for dynamic HTML output. Do not copy Core source into this project or edit files in `vendor/`.

### Adding a page

1. Create a controller in `app/Controllers/`, with a public action that accepts `Request` and returns `Response`.
2. Create a server-rendered template in `app/Views/pages/` and escape dynamic values with `e()`.
3. Register the URL in `config/route.php` using `get()` or `post()` and a stable route name.

Dynamic segments use `{parameter_name}` syntax. For example, `/items/{slug}` passes the matched value to the action as `$params['slug']`. An optional route constraint can restrict the segment, as shown in the commented example in `config/route.php`.

## Deployment

Configure the web server document root as `project-root/public/`. `public_html` is a symlink to `public/` for shared hosts that require that directory name; the host must allow symlink traversal. Never expose the repository root, `.env`, `vendor/`, or `writable/`.

Set `APP_ENV=production`, `APP_DEBUG=false`, a correct HTTPS `APP_URL`, and a valid timezone. Keep `writable/cache` and `writable/logs` private and writable by the PHP-FPM/Apache user.
