<?php

namespace Service;

use Model\UrlList;

class UrlManagerService
{
    /**
     * @param string $short
     * @param string $long
     */
    public function createUrl(string $short, string $long): void
    {
        $urlList = new UrlList();
        $urlList->create('/' . $short, $long);
    }

    /**
     * @param string $short
     * @return string
     */
    public function getLongByShort(string $short): string
    {
        $urlList = new UrlList();
        $long = $urlList->getLongByShort($short);

        return $long;
    }

    /**
     * @param string $long
     * @return bool
     */
    public function validateUrl(string $long): bool
    {
        if (!filter_var($long, FILTER_VALIDATE_URL)) {
            return false;
        }

        return true;
    }
}