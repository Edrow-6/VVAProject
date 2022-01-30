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
            'nom' => session('nom') ?? '',
            'prenom' => session('prenom') ?? '',
            'email' => session('email') ?? ''
        ]);
    }
}