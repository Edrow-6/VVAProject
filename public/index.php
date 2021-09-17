<?php

use Bramus\Router\Router;
use eftec\PdoOne;
use eftec\ValidationOne;

// Afficher les erreurs php si non activé dans php.ini
ini_set('display_errors', 'on');

// Si l'id de session n'existe pas, alors démarrer la session.
if (!session_id()) {
    session_start();
}

$rootDir = dirname(__DIR__);
require $rootDir . '/vendor/autoload.php';

$val = new ValidationOne(); // Bibliothèque de validation

// Initialisation du fichier d'environement .env
$dotenv = Dotenv\Dotenv::createImmutable($rootDir);
$dotenv->load();

require $rootDir . '/config/app.php';

// Initialisation de la base de données avec PDO
function initDatabase()
{
    require '../config/app.php';

    try {
        $conn = new PdoOne("mysql", $config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
        $conn->logLevel = 4; // Utile pour debug et permet de trouver les problèmes en rapport avec les requêtes MySQL. 1 = prod | 4 = dev
        $conn->open();
    } catch (RuntimeException $e) {
        echo 'Erreur de connexion à la base de données.';
    }

    return $conn;
}

// Création de l'instance du Router.
$router = new Router();

// Définition de l'espace de nom par défaut pour tout les controllers.
$router->setNamespace('\App\Controllers');
$router->set404('ErrorController@show');

$router->get('/', 'HomeController@show');

$router->get('/connexion', 'AuthController@show');
$router->post('/connexion', 'AuthController@login');
$router->get('/connexion-github', 'ApiController@github');
$router->get('/connexion-github', 'ApiController@github');

$router->run();