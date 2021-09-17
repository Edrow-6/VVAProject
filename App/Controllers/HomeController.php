<?php

namespace App\Controllers;

//use function App\Utils\render;

class HomeController
{
    public function show() {
        require __DIR__ . '/../Utils/render.php';
        render('home', ['titre' => 'Accueil • ', 'app' => $_ENV['APP_NAME']]); // [] = array()
    }
}