<?php
declare(strict_types=1);

$root = dirname(__DIR__);
require $root . '/vendor/autoload.php';
$application = require $root . '/bootstrap/app.php';

use CodeverseIndia\LightPHP\Core\Request;

$tests = 0;
$failures = [];
$assert = static function (bool $condition, string $name) use (&$tests, &$failures): void {
    $tests++;
    if (!$condition) {
        $failures[] = $name;
    }
};

$home = $application->handle(new Request('GET', '/'));
$appName = (string) $application->config()->get('app.name', 'LightPHP App Starter');
$assert($home->status() === 200 && str_contains($home->body(), 'Welcome to ' . e($appName)), 'Welcome page renders the configured application name');

$escaped = $application->view()->render('pages/welcome', ['appName' => '<script>alert(1)</script>']);
$assert(!str_contains($escaped, '<script>alert(1)</script>')
    && str_contains($escaped, '&lt;script&gt;alert(1)&lt;/script&gt;'), 'Welcome page escapes dynamic application names');

$about = $application->handle(new Request('GET', '/about'));
$assert($about->status() === 200 && str_contains($about->body(), 'About ' . e($appName)), 'About page renders');

$contact = $application->handle(new Request('GET', '/contact'));
$assert($contact->status() === 200 && str_contains($contact->body(), 'Contact'), 'Contact page renders');

$assert(str_contains($home->body(), 'href="/css/styles.css"')
    && str_contains($about->body(), 'href="/css/styles.css"')
    && str_contains($contact->body(), 'href="/css/styles.css"'), 'All starter pages use the shared stylesheet');
$assert(is_file($root . '/public/css/styles.css'), 'Shared stylesheet exists in the public document root');

$missing = $application->handle(new Request('GET', '/packages'));
$assert($missing->status() === 404, 'Travel-specific routes are not registered in the Core starter');

$routes = $application->router()->all();
$assert(count($routes) === 3
    && in_array('/', array_column($routes, 'uri'), true)
    && in_array('/about', array_column($routes, 'uri'), true)
    && in_array('/contact', array_column($routes, 'uri'), true), 'Starter registers welcome, About, and Contact routes');

echo "{$tests} starter tests, " . count($failures) . " failures\n";
foreach ($failures as $failure) {
    fwrite(STDERR, "FAIL: {$failure}\n");
}
exit($failures === [] ? 0 : 1);
