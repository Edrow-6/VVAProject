<?php
use Bramus\Router\Router;
use eftec\bladeone\BladeOne;
use eftec\PdoOne;
use eftec\ValidationOne;

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

// Rendu avec le système blade indépendant
function render($template, $params = [])
{
    $rootDir = dirname(__DIR__);
    $views = $rootDir . '/views';
    $cache = $rootDir . '/storage/cache';
    $blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);
    $blade->addAssetDict([
        'tailwindcss' => 'assets/css/compiled.min.css',
        'fontawesomepro' => 'assets/css/all.min.css',
        'favicon' => 'assets/images/favicon-32x32.png'
    ]);
    //$blade->addInclude('modules.sidebar', 'sidebar');

    echo $blade->run($template, $params);
}

// Initialisation de la base de données avec PDO
function initDatabase()
{
    $rootDir = dirname(__DIR__);
    require $rootDir . '/config/app.php';

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

$router->get('/', function () {
    $con = initDatabase();

    render('home', ['titre' => 'Accueil • ', 'app' => 'EN TEST']); // [] = array()
});

$router->get('/connexion', function () {
    $con = initDatabase();

    render('auth.connexion', ['titre' => 'Se connecter • ', 'app' => $_ENV['APP_NAME']]); // [] = array()
});

$router->get('/connexion-github', function () {
    $rootDir = dirname(__DIR__);
    include $rootDir . '/App/OAuth2/GitHub.php';
});

$router->set404(function() {
    render('404');
});

$router->run();