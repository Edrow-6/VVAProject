<?php

namespace App\Controllers;

//use function App\Utils\render;

class AuthController
{
    public function show() {
        require __DIR__ . '/../Utils/render.php';
        render('auth.connexion', ['titre' => 'Se connecter • ', 'app' => $_ENV['APP_NAME']]); // [] = array()
    }

    public function login() {
        $conn = initDatabase();
    
        if (isset($_POST['email']) && isset($_POST['password'])) {
        
        }
    }
}