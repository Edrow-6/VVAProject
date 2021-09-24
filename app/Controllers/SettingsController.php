<?php

namespace App\Controllers;

use App\Models\User;

//use function App\Utils\render;
require __DIR__ . '/../Utils/functions.php';

class SettingsController
{
    public function account() {
        //debug('debug', $_SESSION);
        $nom = $prenom = $email = $numero_tel = '';
        if ($_SESSION) {
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];
            $email = $_SESSION['email'];
            $numero_tel = $_SESSION['numero_tel'];
        }

        render('settings.account', [
            'titre' => 'Compte • ', 
            'app' => $_ENV['APP_NAME'], 
            'page' => 'account',
            'nom' => $nom, 
            'prenom' => $prenom,
            'email' => $email,
            'numero_tel' => $numero_tel
        ]); // [] = array()
    }

    public function saveAccount() {
        if (isset($_POST['save'])) {
            User::update($_SESSION['id'], ['nom' => $_POST['last-name'], 'prenom' => $_POST['first-name'], 'email' => $_POST['email-address'], 'numero_tel' => $_POST['phone-number']]);
        }
        header('Location: /settings/account');
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

    public function saveSecurity() {
        if (isset($_POST['save'])) {
            // TODO
        }
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

    public function saveBilling() {
        if (isset($_POST['save'])) {
            // COMMING SOON
        }
    }
}