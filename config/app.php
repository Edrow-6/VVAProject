<?php

// Déclarations des variables de configuration.
$config = array(
    'app_name' => $_ENV['APP_NAME'],
    'app_debug' => $_ENV['APP_DEBUG'],

    'db_host' => $_ENV['DB_HOST'],
    'db_user' => $_ENV['DB_USER'],
    'db_pass' => $_ENV['DB_PASS'],
    'db_name' => $_ENV['DB_NAME'],
);
return $config;