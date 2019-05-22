<?php

namespace Components\TemplateEngine;

class View
{
    /**
     * @param string $name
     * @param array|null $params
     */
    public function load(string $name, array $params = null)
    {
        if($params) {
            extract($params);
        }
        
        include_once dirname(__DIR__) . '/../View/'.$name.'.php';
    }
}