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
        if ($_SESSION) {
            $nom = $_SESSION['nom'] ?? '';
            $prenom = $_SESSION['prenom'] ?? '';
        }

        $hebergements = Lodging::select();
        $types_heb = Lodging::selectType();

        $this->render('home.lodginglist', [
            'nom' => $nom = '',
            'prenom' => $prenom = '',
            'hebergements' => $hebergements,
            'types_heb' => $types_heb
        ]);
    }
}