<?php
declare(strict_types=1);

use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\ContactController;
use CodeverseIndia\LightPHP\Application;
use CodeverseIndia\LightPHP\Core\Router;

// Register every client route here. Route registration is explicit: the URL,
// controller method, and route name are kept in one place for maintainability.
return static function (Router $routes, Application $application): void {
    $routes->get('/', [new HomeController($application), 'index'], 'home');
    $routes->get('/about', [new AboutController($application), 'index'], 'about');
    $routes->get('/contact', [new ContactController($application), 'index'], 'contact');

    /*
     * Dynamic route example:
     *
     * $routes->get(
     *     '/items/{slug}',
     *     [new ItemController($application), 'show'],
     *     'item.show',
     *     false,
     *     ['slug' => '[a-z0-9][a-z0-9-]*'],
     * );
     *
     * In ItemController::show(Request $request, array $params): Response,
     * read the URL value as $params['slug']. The optional constraint is applied
     * to the route segment; the default constraint is alphanumeric plus ._-.
     */
};
