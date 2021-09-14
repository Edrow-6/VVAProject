<?php
use Bramus\Router\Router;
use eftec\bladeone\BladeOne;
use eftec\PdoOne;
use eftec\ValidationOne;

$root_dir = dirname(__DIR__);
require $root_dir . '/vendor/autoload.php';

$val = new ValidationOne(); // Library de validation


// Initialisation du fichier d'environement .env
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

// Rendu avec le système blade indépendant
function render($template, $params)
{
    $root_dir = dirname(__DIR__);
    $views = $root_dir . '/views';
    $cache = $root_dir . '/storage/cache';
    $blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);
    //$blade->addInclude('modules.sidebar', 'sidebar');
    //$blade->addInclude('modules.navbar', 'navbar');

    echo $blade->run($template, $params);
}

// Initialisation de la base de données avec PDO
function initDB()
{
    $con = new PdoOne("mysql", $_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);
    $con->logLevel = 3; // Utile pour debug et permet de trouver les problèmes en rapport avec les requêtes MySQL.
    $con->open();

    return $con;
}

$router = new Router();
$router->get('/', function () {
    $con = initDB();

    render('home', ['titre' => 'Accueil • ', 'app' => $_ENV['APP_NAME']]); // [] = array()
});

$router->get('/connexion', function () {
    $con = initDB();

    render('auth.connexion', ['titre' => 'Se connecter • ', 'app' => $_ENV['APP_NAME']]); // [] = array()
});

$router->run();