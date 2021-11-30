<?php

namespace App\Controllers\Dashboard;

use App\Controllers\Controller;
use App\Models\Lodging;
use App\Models\User;
use App\Utils\Condition;
use Exception;

class StatsController extends Controller
{
    /**
     * @throws Exception
     */
    public function show() {
        if ($_SESSION) {
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];
            $email = $_SESSION['email'];
            $numero_tel = $_SESSION['numero_tel'];
        }

        switch (Condition::asRole([$_SESSION['type_compte']])) {
            case 'admin': // Administrateur
                $type_compte = 'admin';

                $hebergements = Lodging::select();
                $types_heb = Lodging::selectType();

                $this->render('dashboard.stats', [
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'email' => $email,
                    'numero_tel' => $numero_tel,
                    'type_compte' => $type_compte,
                    'hebergements' => $hebergements,
                    'types_heb' => $types_heb
                ]);
                break;
            case 'gestion': // Gestionnaire
                $type_compte = 'gestion';
                echo 'A faire';
                break;
            case 'vacancier': // Vacancier
                $type_compte = 'vacancier';
                echo 'A faire';
                break;
        }
    }
}