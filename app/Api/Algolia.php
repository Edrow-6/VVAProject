<?php

use Algolia\AlgoliaSearch\SearchClient;
use App\Models\Lodging;
use Dotenv\Dotenv;

require __DIR__.'/../../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();

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
