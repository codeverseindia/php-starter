# Project instructions

- Use native PHP 8.5+ with strict typing and follow existing lightweight patterns.
- Use `codeverseindia/lightphp-core` as the application foundation. Do not copy package source into this project or edit files under `vendor/`.
- Keep client route registration centralized in `config/route.php`; do not add controller discovery or dynamic URL-based includes.
- Preserve CSRF, validation, output escaping, security headers, private cache/log storage, and request-size limits.
- Use server-rendered PHP templates and escape dynamic output with `e()`.
- Keep `public/` as the only web document root; keep configuration and `writable/` private.
- Keep the starter dependency-light. Do not introduce frontend frameworks, build tools, databases, or dependencies without an actual requirement.
