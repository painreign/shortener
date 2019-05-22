<?php

namespace Controller;

use Service\UrlManagerService;

class RedirectController {
    /**
     * @param string $short
     */
    public function openUrl(string $short)
    {
        $urlManager = new UrlManagerService();
        $long = $urlManager->getLongByShort($short);
        header('Location: '.$long);
    }
}