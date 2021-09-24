<?php

namespace App\Controllers;

//use function App\Utils\render;
require __DIR__ . '/../Utils/functions.php';

class UserController
{
    public function profile() {
        //debug('debug', $_SESSION);
        if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];
        } else {
            $nom = "";
            $prenom = "";
        }
        render('settings.profil', [
            'titre' => 'Profil • ', 
            'app' => $_ENV['APP_NAME'], 
            'nom' => $nom, 
            'prenom' => $prenom
        ]); // [] = array()
    }
}