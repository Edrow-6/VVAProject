<?php

namespace App\Controllers;

//use function App\Utils\render;
use Exception;

class HomeController extends Controller
{
    /**
     * @throws Exception
     */
    public function show() {
        if ($_SESSION) {
            $nom = $_SESSION['nom'] ?? '';
            $prenom = $_SESSION['prenom'] ?? '';
        }

        $this->render('home.home', [
            'nom' => $nom = '',
            'prenom' => $prenom = ''
        ]);
    }
}