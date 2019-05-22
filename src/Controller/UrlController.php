<?php

namespace Controller;

use Components\Config\Config;
use Components\TemplateEngine\View;
use Service\UrlManagerService;

class UrlController
{
    public function showForm(): void
    {
        $view = new View();
        $view->load('Form');
    }

    public function createUrl(array $request): void
    {
        $short = uniqid();
        $long = $request['url'];

        $urlManager = new UrlManagerService();
        
        if (!$urlManager->validateUrl($long)) {
            $this->displayError($long);
            return;
        }
        
        $urlManager->createUrl($short, $long);
        echo Config::$baseUrl . $short;
    }

    private function displayError(string $long): void
    {
        $view = new View();
        $view->load('FormError', array('long' => $long));
    }
}