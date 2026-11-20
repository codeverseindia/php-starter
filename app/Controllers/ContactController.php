<?php
declare(strict_types=1);

namespace App\Controllers;

use CodeverseIndia\LightPHP\Application;
use CodeverseIndia\LightPHP\Core\Request;
use CodeverseIndia\LightPHP\Core\Response;

final class ContactController
{
    // Constructor dependencies are resolved when the route is registered.
    // Add page-specific services here instead of using dynamic controller discovery.
    public function __construct(private readonly Application $application)
    {
    }

    // Escape values passed to server-rendered templates with e().
    public function index(Request $request): Response
    {
        $appName = (string) $this->application->config()->get('app.name', 'LightPHP App Starter');

        return Response::html($this->application->view()->render('pages/contact', [
            'appName' => $appName,
        ]));
    }
}
