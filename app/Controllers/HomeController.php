<?php

namespace App\Controllers;

//use function App\Utils\render;
use Exception;

class HomeController extends Controller
{
    /**
     * @throws Exception
     */
    public function show($flash = '') {
        if ($_SESSION) {
            $nom = $_SESSION['nom'] ?? '';
            $prenom = $_SESSION['prenom'] ?? '';
        }

        $this->render('home.home', [
            'flash' => $flash,
            'nom' => $nom = '',
            'prenom' => $prenom = ''
        ]);
    }
}