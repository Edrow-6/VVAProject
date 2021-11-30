<?php

namespace App\Controllers\Dashboard;

use App\Controllers\Controller;
use App\Models\Lodging;
use App\Models\User;
use App\Utils\Condition;
use Exception;

class BookingsController extends Controller
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
                break;
            case 'gestion': // Gestionnaire
                $type_compte = 'gestion';
                break;
        }

        $this->render('dashboard.bookings', [
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'numero_tel' => $numero_tel,
            'lodging_picture' => 'https://www.rgd.fr/wp-content/uploads/2021/01/avatar-anonyme.png', //"../assets/uploads/avatars/{$_SESSION['avatar']}",
            'type_compte' => $type_compte,
            'hebergements' => $hebergements,
            'types_heb' => $types_heb
        ]);
    }
}