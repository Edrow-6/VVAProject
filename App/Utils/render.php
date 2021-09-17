<?php

declare(strict_types=1);

//namespace App\Utils;

use eftec\bladeone\BladeOne;

// Rendu avec le système blade indépendants
function render($template, $params = []): void
{
    $rootDir = dirname(__DIR__);
    $views = $rootDir . '/../views';
    $cache = $rootDir . '/../storage/cache';
    $blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);
    $blade->addAssetDict([
        'tailwindcss' => 'assets/css/compiled.min.css',
        'fontawesomepro' => 'assets/css/all.min.css',
        'favicon' => 'assets/images/favicon-32x32.png',
        'logo' => 'assets/images/logo.png'
    ]);

    echo $blade->run($template, $params);
}