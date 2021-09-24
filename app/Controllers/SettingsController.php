<?php

namespace App\Controllers;

//use function App\Utils\render;
require __DIR__ . '/../Utils/functions.php';

class SettingsController
{
    public function account() {
        //debug('debug', $_SESSION);
        if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];
        } else {
            $nom = "";
            $prenom = "";
        }
        render('settings.account', [
            'titre' => 'Compte • ', 
            'app' => $_ENV['APP_NAME'], 
            'page' => 'account',
            'nom' => $nom, 
            'prenom' => $prenom
        ]); // [] = array()
    }

    public function security() {
        //debug('debug', $_SESSION);
        if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];
        } else {
            $nom = "";
            $prenom = "";
        }
        render('settings.security', [
            'titre' => 'Sécurité • ', 
            'app' => $_ENV['APP_NAME'], 
            'page' => 'security',
            'nom' => $nom, 
            'prenom' => $prenom
        ]); // [] = array()
    }

    public function billing() {
        //debug('debug', $_SESSION);
        if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];
        } else {
            $nom = "";
            $prenom = "";
        }
        render('settings.billing', [
            'titre' => 'Facturation • ', 
            'app' => $_ENV['APP_NAME'], 
            'page' => 'billing',
            'nom' => $nom, 
            'prenom' => $prenom
        ]); // [] = array()
    }
}