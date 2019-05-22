<?php

spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    include dirname(__DIR__). '/src/' . $class . '.php';
});