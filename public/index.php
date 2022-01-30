<?php

use App\Utils\Condition;
use Bramus\Router\Router;
use eftec\PdoOne;

// Si l'id de session n'existe pas, alors démarrer la session.
if (!session_id()) @session_start();

// Init des accès aux librairies.
require __DIR__ . '/../vendor/autoload.php';

// Initialisation du fichier d'environement .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

// Afficher les erreurs php si non activé dans php.ini
ini_set('display_errors', 'on');

//Spatie\Ignition\Ignition::make()->shouldDisplayException($_ENV['APP_DEBUG'])->useDarkMode()->register();
Symfony\Component\ErrorHandler\Debug::enable();

$pdo = null;
/**
 * Initialisation de la base de données avec PDO
 * @return eftec\PdoOne
 * @throws Exception
 */
function database(): eftec\PdoOne
{
    global $pdo;
    if ($pdo === null) {
        $pdo = new PdoOne("mysql", $_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);
        $pdo->logLevel = 4; // Utile pour debug et permet de trouver les problèmes en rapport avec les requêtes MySQL. 1 = prod | 4 = dev
        $pdo->open();
    }

    return $pdo;
}

if (!function_exists('session')) {
    function session(string|array $key = null)
    {
        if (is_null($key)) {
            return new \App\Utils\SessionManager();
        } else {
            if (is_string($key)) {
                return (new \App\Utils\SessionManager())->get($key);
            } else if (is_array($key)) {
                foreach ($key as $data => $value) {
                    (new \App\Utils\SessionManager())->set($data, $value);
                }
            }
        }
    }
}

// Création de l'instance du Router.
$router = new Router();

// Définition de l'espace de nom par défaut pour tout les controllers.
$router->setNamespace('\App\Controllers');
$router->set404('ErrorController@show');

// Pages Auth
$router->mount('/auth', function () use ($router) {
    $router->mount('/login', function () use ($router) {
        $router->get('/', 'Auth\LoginController@show');
        $router->post('/', 'Auth\LoginController@login');
    });

    $router->mount('/register', function () use ($router) {
        $router->get('/', 'Auth\RegisterController@show');
        $router->post('/', 'Auth\RegisterController@register');
    });

    $router->get('/logout', 'Auth\LoginController@logout');
});

// Pages Guest
$router->mount('/*', function () use ($router) {
    $router->get('/', 'HomeController@show');
    $router->get('/lodging', 'LodgingListController@show');
});

// Pages User Settings
$router->before('GET|POST', '/account/.*', function () {
    if (!Condition::isAuth()) {
        header('location: /auth/login');
        exit();
    }
});
$router->before('GET|POST', '/auth/login', function () {
    if (Condition::isAuth()) {
        header('location: /');
        exit();
    }
});

$router->mount('/account', function () use ($router) {
    $router->get('/settings', 'Account\SettingsController@show');
    $router->post('/settings', 'Account\SettingsController@save');

    $router->get('/security', 'Account\SecurityController@show');
    $router->post('/security', 'Account\SecurityController@save');

    $router->get('/billing', 'Account\BillingController@show');
    $router->post('/billing', 'Account\BillingController@save');
});

// Panel Administration
$router->before('GET|POST', '/dashboard/.*', function () {
    if (!Condition::isAuth() || !Condition::asRole(['admin', 'gestion'])) {
        header('location: /auth/login');
        exit();
    }
});

$router->before('GET|POST', '/dashboard/*', function () {
    if (!Condition::isAuth() || !Condition::asRole(['admin', 'gestion'])) {
        header('location: /auth/login');
        exit();
    }
});

$router->mount('/dashboard', function () use ($router) {
    $router->get('/', 'Dashboard\StatsController@show');
    $router->get('/lodgings', 'Dashboard\LodgingsController@show');
    $router->post('/lodgings', 'Dashboard\LodgingsController@delete');
    $router->get('/bookings', 'Dashboard\BookingsController@show');
    $router->get('/users', 'Dashboard\UsersController@show');
    $router->get('/add_entry', 'Dashboard\AddEntryController@show');
});

$router->run();
