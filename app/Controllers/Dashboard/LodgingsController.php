<?php

namespace App\Controllers\Dashboard;

use App\Controllers\Controller;
use App\Models\Lodging;
use App\Utils\Condition;
use Exception;
use App\Utils\Notify;

class LodgingsController extends Controller
{
    /**
     * @throws Exception
     */
    public function show()
    {
        $type_compte = '';
        switch (Condition::asRole([session('type_compte')])) {
            case 'admin': // Administrateur
                $type_compte = 'admin';
                break;
            case 'gestion': // Gestionnaire
                $type_compte = 'gestion';
                break;
        }

        $this->render('dashboard.pages.lodgings', [
            'nom' => session('nom') ?? '',
            'prenom' => session('prenom') ?? '',
            'email' => session('email') ?? '',
            'numero_tel' => session('numero_tel') ?? '',
            'lodging_picture' => 'https://www.rgd.fr/wp-content/uploads/2021/01/avatar-anonyme.png',
            'type_compte' => $type_compte,
            'hebergements' => Lodging::select(),
            'types_heb' => Lodging::selectType()
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
