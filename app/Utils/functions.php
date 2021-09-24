<?php

declare(strict_types=1);

//namespace App\Utils;

use eftec\bladeone\BladeOne;
use eftec\PdoOne;

// Rendu avec le système blade indépendants
function render($template, $params = []): void
{
    $rootDir = dirname(__DIR__);
    $views = $rootDir . '/../views';
    $cache = $rootDir . '/../storage/cache';
    $blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);
    $blade->addAssetDict([
        'tailwindcss' => '../assets/css/compiled.min.css',
        'fontawesomepro' => '../assets/css/all.min.css',
        'favicon' => '../assets/images/favicon-32x32.png',
        'logo' => '../assets/images/logo.png'
    ]);
    if (isset($_SESSION['id'])) {
        $blade->setAuth($_SESSION['id']);
    }

    echo $blade->run($template, $params);
}

// Initialisation de la base de données avec PDO
function initDatabase(): eftec\PdoOne
{
    require dirname(__DIR__) . '/../config/app.php';

    try {
        $conn = new PdoOne("mysql", $config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
        $conn->logLevel = 4; // Utile pour debug et permet de trouver les problèmes en rapport avec les requêtes MySQL. 1 = prod | 4 = dev
        $conn->open();
    } catch (RuntimeException $e) {
        echo 'Erreur de connexion à la base de données.';
    }

    return $conn;
}

function debug($type, $message): void
{
    if ($_ENV['APP_DEBUG']) {
        switch ($type) {
            case 'error':
                $type = 'red';
                break;
            case 'debug':
                $type = 'indigo';
                break;
            case 'info':
                $type = 'blue';
                break;
            case 'notice':
                $type = 'green';
                break;
            case 'warning':
                $type = 'yellow';
                break;
        }

        echo <<<EOF
            <div class="fixed inset-x-0 bottom-0 z-50">
            <div class="bg-{$type}-600">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between flex-wrap">
            <div class="w-0 flex-1 flex items-center">
            <span class="flex p-2 rounded-lg bg-{$type}-800">
            <i class="fad fa-debug text-white"></i>
            </span>
            <p class="ml-3 font-medium text-white truncate">
            <span class="md:hidden">
            We announced a new product!
            </span>
            <span class="hidden md:inline">
        EOF;
        var_dump($message);
        echo <<<EOF
            </span>
            </p>
            </div>
            <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
            <form method="POST" class="mb-0">
            <input type="hidden" name="pastebin">
            <button type="submit" id="pastebin" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-{$type}-600 bg-white hover:bg-indigo-50">
            Pastebin <!-- Plus d'infos -->
            </button>
            </form>
            </div>
            <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
            <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-{$type}-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
            <span class="sr-only">Dismiss</span>
            <i class="fal fa-times text-white"></i>
            </button>
            </div>
            </div>
            </div>
            </div>
            </div>
        EOF;
    }
}