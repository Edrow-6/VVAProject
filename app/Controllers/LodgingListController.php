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
            'nom' => session('nom') ?? '',
            'prenom' =>  session('prenom') ?? '',
            'email' => session('email') ?? '',
            'hebergements' => Lodging::select(),
            'types_heb' => Lodging::selectType()
        ]);
    }
}