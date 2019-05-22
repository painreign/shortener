<?php

namespace Components\Model;

use Components\Config\Config;
use PDO;

class Model
{
    protected $pdo;
    
    public function __construct()
    {
        $this->pdo = new PDO(Config::$dbConnection, Config::$dbUser, Config::$dbPass);
    }
}