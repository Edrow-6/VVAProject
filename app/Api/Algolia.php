<?php

use Algolia\AlgoliaSearch\SearchClient;
use App\Models\Lodging;
use Dotenv\Dotenv;
use eftec\PdoOne;

require __DIR__.'/../../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();

$pdo = null;
/**
 * Initialisation de la base de données avec PDO
 * @return eftec\PdoOne
 * @throws Exception
 */
function database(): eftec\PdoOne
{
    // Fichier de configurations avec les variables .env
    $config = require __DIR__.'/../../config/app.php';

    global $pdo;
    if ($pdo === null) {
        $pdo = new PdoOne("mysql", $config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
        $pdo->logLevel = 4; // Utile pour debug et permet de trouver les problèmes en rapport avec les requêtes MySQL. 1 = prod | 4 = dev
        $pdo->open();
    }

    return $pdo;
}

$ALGOLIA_APP_ID = $_ENV['ALGOLIA_APP_ID'];
$ALGOLIA_API_KEY = $_ENV['ALGOLIA_API_KEY'];
$ALGOLIA_INDEX_NAME = $_ENV['ALGOLIA_INDEX_NAME'];

$client = SearchClient::create($ALGOLIA_APP_ID, $ALGOLIA_API_KEY);

$index = $client->initIndex($ALGOLIA_INDEX_NAME);

$hebObject = Lodging::select();
$res = $index->saveObjects([['test' => 1, 'nom' => 'save']], ['objectIDKey' => 'test']);

$res->wait();

$objects = $index->search('sa');
print_r($objects);
