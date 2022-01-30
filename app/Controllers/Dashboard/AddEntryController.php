<?php

namespace App\Controllers\Dashboard;

use App\Controllers\Controller;
use App\Models\Lodging;
use App\Utils\Condition;
use Exception;

class AddEntryController extends Controller
{
    /**
     * @throws Exception
     */
    public function show() {
        $type_compte = '';
        switch (Condition::asRole([session('type_compte')])) {
            case 'admin': // Administrateur
                $type_compte = 'admin';
                break;
            case 'gestion': // Gestionnaire
                $type_compte = 'gestion';
                break;
        }

        $this->render('dashboard.pages.add-entry', [
            'nom' => session('nom') ?? '',
            'prenom' => session('prenom') ?? '',
            'email' => session('email') ?? '',
            'numero_tel' => session('numero_tel') ?? '',
            'type_compte' => $type_compte,
            'hebergements' => Lodging::select(),
            'types_heb' => Lodging::selectType()
        ]);
    }
}