<?php
declare(strict_types=1);

namespace App\Controllers;

use CodeverseIndia\LightPHP\Application;
use CodeverseIndia\LightPHP\Core\Request;
use CodeverseIndia\LightPHP\Core\Response;

final class HomeController
{
    // Inject the application once so controllers can access configuration,
    // views, and other application services through a shared instance.
    public function __construct(private readonly Application $application)
    {
    }

    // A controller action receives the Request and must return a Response.
    // Load configuration and render a named view in app/Views/pages/.
    public function index(Request $request): Response
    {
        $appName = (string) $this->application->config()->get('app.name', 'LightPHP App Starter');
        return Response::html($this->application->view()->render('pages/welcome', [
            'appName' => $appName,
        ]));
    }
}
