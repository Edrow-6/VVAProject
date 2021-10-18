<?php

namespace App\Controllers;

use App\Models\Lodging;

//use function App\Utils\render;
require __DIR__ . '/../Utils/functions.php';

class DashController
{
    public function index() {
        //debug('error', $_SESSION['type_compte']);
        $nom = $prenom = $email = $numero_tel = $test = '';
        if ($_SESSION) {
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];
            $email = $_SESSION['email'];
            $numero_tel = $_SESSION['numero_tel'];
        }

        switch (isset($_SESSION['type_compte'])) {
            case 'admin': // Administrateur
                $test = 'admin';
                break;
            case 'gestion': // Gestionnaire
                $test = 'gestion';
                break;
            case 'vacancier': // Vacancier
                $test = 'vacancier';
                break;
        }

        $hebergements = Lodging::select();
        $types_heb = Lodging::selectType();
        
        render('dashboard.index', [
            'titre' => 'Tableau de Bord', 
            'app' => $_ENV['APP_NAME'],
            'page' => 'dashboard',
            'nom' => $nom, 
            'prenom' => $prenom,
            'email' => $email,
            'numero_tel' => $numero_tel,
            'avatar' => 'https://www.rgd.fr/wp-content/uploads/2021/01/avatar-anonyme.png', //"../assets/uploads/avatars/{$_SESSION['avatar']}",
            'test' => $test,
            'hebergements' => $hebergements,
            'types_heb' => $types_heb
        ]); // [] = array()
    }
}