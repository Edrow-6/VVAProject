<?php

namespace App\Controllers;

//use function App\Utils\render;
require __DIR__.'/../Utils/functions.php';

class ErrorController
{
    public function show() {
        render('404', [
            'titre' => 'Erreur 404', 
            'app' => $_ENV['APP_NAME']
        ]); // [] = array()
    }
}