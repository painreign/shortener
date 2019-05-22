<?php

namespace Components\Router;

use Controller\RedirectController;
use Controller\UrlController;

class Router
{
    public function route()
    {
        switch ($_SERVER['REQUEST_URI']) {
            case '/':
                $urlController = new UrlController();
                $urlController->showForm();
                break;
            case '/create':
                $urlController = new UrlController();
                $urlController->createUrl($_REQUEST);
                break;
            default:
                $redirect = new RedirectController();
                $redirect->openUrl($_SERVER['REQUEST_URI']);
        }
    }
}