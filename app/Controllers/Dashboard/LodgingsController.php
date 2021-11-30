<?php

namespace App\Controllers\Dashboard;

use App\Controllers\Controller;
use App\Models\Lodging;
use App\Models\User;
use App\Utils\Condition;
use App\Utils\Notify;
use Exception;

class LodgingsController extends Controller
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

        $this->render('dashboard.lodgings', [
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

    /**
     * @return void
     * @throws Exception
     */
    public function delete()
    {
        if (isset($_POST['delete'])) {
            Lodging::delete($_POST['delete']);

            Notify::message('success', 'Hébergement supprimé !');
            $this->redirectTo('/dashboard/lodgings');
        }
        if (isset($_POST['archive'])) {
            // TODO: Backend archive ici
            Notify::message('success', 'Archivé avec succès !');
            $this->redirectTo('/dashboard/lodgings');
        }
    }
}