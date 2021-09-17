<?php

namespace App\Controllers;

//use function App\Utils\render;

class ErrorController
{
    public function show() {
        require __DIR__ . '/../Utils/render.php';
        render('404', ['titre' => 'Erreur 404 • ', 'app' => $_ENV['APP_NAME']]); // [] = array()
    }
}