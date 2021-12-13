<?php

namespace App\Controllers;

//use function App\Utils\render;
use App\Models\Lodging;
use Exception;

class LodgingListController extends Controller
{
    /**
     * @throws Exception
     */
    public function show() {
        $this->render('home.pages.lodginglist', [
            'nom' => $_SESSION['nom'] ?? '',
            'prenom' =>  $_SESSION['prenom'] ?? '',
            'email' => $_SESSION['prenom'] ?? '',
            'hebergements' => Lodging::select(),
            'types_heb' => Lodging::selectType()
        ]);
    }
}