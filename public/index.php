<?php

use Bramus\Router\Router;
use Symfony\Component\ErrorHandler\Debug;
use App\Utils\Functions;

// Si l'id de session n'existe pas, alors démarrer la session.
if (!session_id()) @session_start();

// Init des accès aux librairies.
require __DIR__.'/../vendor/autoload.php';

// Initialisation du fichier d'environement .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

// Fichier de configurations avec les variables .env
$config = require __DIR__.'/../config/app.php';

// Afficher les erreurs php si non activé dans php.ini
ini_set('display_errors', 'on');

if ($config['app_debug']) {
    Debug::enable();
}

// Création de l'instance du Router.
$router = new Router();

// Définition de l'espace de nom par défaut pour tout les controllers.
$router->setNamespace('\App\Controllers');
$router->set404('ErrorController@show');

$router->mount('/auth', function () use ($router) {
    $router->mount('/login', function () use ($router) {
        $router->get('/', 'LoginController@show');
        $router->post('/', 'LoginController@login');
    });

    $router->mount('/register', function () use ($router) {
        $router->get('/', 'RegisterController@show');
        $router->post('/', 'RegisterController@register');
    });

    $router->get('/logout', 'LoginController@logout');
});

$router->get('/', 'HomeController@show');
$router->post('/', 'HomeController@pastebin');

// Paramètres Utilisateur
$router->before('GET|POST', '/settings/.*', function () {
    $function = new Functions();
    if (!$function->isAuth()) {
        header('location: /auth/login');
        exit();
    }
});
$router->before('GET|POST', '/auth/login', function () {
    $function = new Functions();
    if ($function->isAuth()) {
        header('location: /');
        exit();
    }
});

$router->mount('/settings', function () use ($router) {
    $router->get('/account', 'SettingsController@account');
    $router->post('/account', 'SettingsController@saveAccount');

    $router->get('/security', 'SettingsController@security');
    $router->post('/security', 'SettingsController@saveSecurity');

    $router->get('/billing', 'SettingsController@billing');
    $router->post('/billing', 'SettingsController@saveBilling');
});

// Panel Utilisateur
$router->before('GET|POST', '/dash', function () {
    $function = new Functions();
    if ($function->isAuth()) {
        header('location: /auth/login');
        exit();
    }
});

$router->mount('/dash', function () use ($router) {
    $router->get('/', 'DashController@index');
});

// Panel Administration
$router->before('GET|POST', '/dash/admin/.*', function () {
    $function = new Functions();
    if ($function->isAuth('admin')) {
        // A faire
    } else {
        header('location: /auth/login');
        exit();
    }
});

$router->mount('/dash/admin', function () use ($router) {});

$router->run();


