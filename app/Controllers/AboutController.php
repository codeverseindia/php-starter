<?php
declare(strict_types=1);

namespace App\Controllers;

use CodeverseIndia\LightPHP\Application;
use CodeverseIndia\LightPHP\Core\Request;
use CodeverseIndia\LightPHP\Core\Response;

final class AboutController
{
    // Keep application services in the constructor and keep page rendering
    // isolated in public controller actions.
    public function __construct(private readonly Application $application)
    {
    }

    // Route handlers must return an HTML or another appropriate Response.
    public function index(Request $request): Response
    {
        $appName = (string) $this->application->config()->get('app.name', 'LightPHP App Starter');

        return Response::html($this->application->view()->render('pages/about', [
            'appName' => $appName,
        ]));
    }
}
