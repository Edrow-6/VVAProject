<?php

namespace App\Controllers;

//use function App\Utils\render;
require __DIR__ . '/../Utils/functions.php';

class DashController
{
    public function index() {
        //debug('debug', $_SESSION);
        if (isset($_SESSION['type_compte']) == 'admin') {

        }
        render('dashboard.index', [
            'titre' => 'Tableau de Bord • ', 
            'app' => $_ENV['APP_NAME']
        ]); // [] = array()
    }
}