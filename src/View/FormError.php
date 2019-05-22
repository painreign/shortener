<?php

use Components\Config\Config;

echo("$long is not a valid URL: ");
echo '<a href="' . Config::$baseUrl . '">try again</a>';
