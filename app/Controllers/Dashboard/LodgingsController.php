<?php

namespace App\Controllers\Dashboard;

use App\Controllers\Controller;
use App\Models\Lodging;
use App\Utils\Condition;
use Exception;
<<<<<<< HEAD
use App\Utils\Notify;
=======
>>>>>>> dev

class LodgingsController extends Controller
{
    /**
     * @throws Exception
     */
<<<<<<< HEAD
    public function show()
    {
        $type_compte = '';
        switch (Condition::asRole([session('type_compte')])) {
=======
    public function show() {
        $type_compte = '';
        switch (Condition::asRole([$_SESSION['type_compte']])) {
>>>>>>> dev
            case 'admin': // Administrateur
                $type_compte = 'admin';
                break;
            case 'gestion': // Gestionnaire
                $type_compte = 'gestion';
                break;
        }

        $this->render('dashboard.pages.lodgings', [
<<<<<<< HEAD
            'nom' => session('nom') ?? '',
            'prenom' => session('prenom') ?? '',
            'email' => session('email') ?? '',
            'numero_tel' => session('numero_tel') ?? '',
            'lodging_picture' => 'https://www.rgd.fr/wp-content/uploads/2021/01/avatar-anonyme.png',
=======
            'nom' => $_SESSION['nom'] ?? '',
            'prenom' => $_SESSION['prenom'] ?? '',
            'email' => $_SESSION['email'] ?? '',
            'numero_tel' => $_SESSION['numero_tel'] ?? '',
            'lodging_picture' => 'https://www.rgd.fr/wp-content/uploads/2021/01/avatar-anonyme.png', //"../assets/uploads/avatars/{$_SESSION['avatar']}",
>>>>>>> dev
            'type_compte' => $type_compte,
            'hebergements' => Lodging::select(),
            'types_heb' => Lodging::selectType()
        ]);
    }
<<<<<<< HEAD

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
=======
}
>>>>>>> dev
