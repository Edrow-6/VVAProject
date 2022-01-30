<?php

namespace App\Controllers;

use Exception;

class HomeController extends Controller
{
    /**
     * @throws Exception
     */
    public function show() {
        $this->render('home.pages.home', [
<<<<<<< HEAD
            'nom' => session('nom') ?? '',
            'prenom' => session('prenom') ?? '',
            'email' => session('email') ?? ''
=======
            'nom' => $_SESSION['nom'] ?? '',
            'prenom' => $_SESSION['prenom'] ?? '',
            'email' => $_SESSION['email'] ?? ''
>>>>>>> dev
        ]);
    }
}