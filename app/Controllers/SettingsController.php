<?php

namespace App\Controllers;

use App\Models\User;
use App\Utils\Logging;
use App\Utils\Notify;
use Exception;

class SettingsController extends Controller
{
    /**
     * @throws Exception
     */
    public function account($flash = ''){
        //debug('debug', $_SESSION);
        $nom = $prenom = $email = $numero_tel = '';
        if ($_SESSION) {
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];
            $email = $_SESSION['email'];
            $numero_tel = $_SESSION['numero_tel'];
        }

        $this->render('settings.account', [
            'flash' => $flash,
            'nom' => $nom, 
            'prenom' => $prenom,
            'email' => $email,
            'numero_tel' => $numero_tel
        ]);
    }

    /**
     * @throws Exception
     */
    public function saveAccount() {
        if (isset($_POST['save-account'])) {
            $nom = $this->validation()->def($_SESSION['nom'])->type('string')->ifFailThenDefault()->post('last-name');
            $prenom = $this->validation()->def($_SESSION['prenom'])->type('string')->ifFailThenDefault()->post('first-name');
            $email = $this->validation()->def($_SESSION['email'])->type('string')->ifFailThenDefault()->post('email-address');
            $num_tel = $this->validation()->def($_SESSION['numero_tel'])->type('string')->ifFailThenDefault()->post('phone-number');

            User::update($_SESSION['id_u'], ['nom' => $nom, 'prenom' => $prenom, 'email' => $email, 'numero_tel' => $num_tel]);

            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['email'] = $email;
            $_SESSION['numero_tel'] = $num_tel;

            $target = __DIR__.'/../../public/assets/images/uploads/avatars/';
            $filename = md5($prenom.$nom);
            //$filename = basename($_FILES["user-photo"]["name"]);
            $filetype = pathinfo(basename($_FILES["user-photo"]["name"]), PATHINFO_EXTENSION);
            $final_filename = "$filename.$filetype";
            $final_url = "$target$filename.$filetype";

            if (!empty($_FILES['user-photo']['name'])) {
                $allowTypes = array('png', 'jpg', 'jpeg', 'gif');
                if (!file_exists($final_url)) {
                    if (in_array($filetype, $allowTypes)) {
                        if (move_uploaded_file($_FILES['user-photo']['tmp_name'], $final_url)) {
                            User::update($_SESSION['id_u'], ['avatar' => $_ENV['APP_URL'].'/assets/images/uploads/avatars/'.$final_filename]);
                            Logging::log()->info('Définition de l\'avatar: '.$_ENV['APP_URL'].'/assets/images/uploads/avatars/'.$final_filename);
                        } else {
                            $flash = Notify::error()->message(['<p class="text-sm font-medium text-gray-900">Erreur</p>', '<p class="mt-1 text-sm text-gray-600">Veuillez choisir un fichier à envoyer.</p>']);
                        }
                    } else {
                        $flash = Notify::error()->message(['<p class="text-sm font-medium text-gray-900">Erreur</p>', '<p class="mt-1 text-sm text-gray-600">Le format de fichier est incorrect.</p>']);
                    }
                } else {
                    $flash = Notify::error()->message(['<p class="text-sm font-medium text-gray-900">Erreur</p>', '<p class="mt-1 text-sm text-gray-600">Cette avatar existe déjà.</p>']);
                }
            }
        }

        $flash = Notify::success()->message(['<p class="text-sm font-medium text-gray-900">Sauvegarde réussie !</p>', '<p class="mt-1 text-sm text-gray-600">Vous informations de compte on été validées avec succès.</p>']);
        $this->account($flash);
    }

    /**
     * @throws Exception
     */
    public function security() {
        $nom = $prenom = $email = '';
        if ($_SESSION) {
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];
            $email = $_SESSION['email'];
        }
        
        $this->render('settings.security', [
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'avatar' => 'https://www.rgd.fr/wp-content/uploads/2021/01/avatar-anonyme.png'
        ]);
    }

    /**
     * @throws Exception
     */
    public function saveSecurity() {
        if (isset($_POST['save-security'])) {
            $old_password = $_POST['old-password'];
            $new_password = $_POST['new-password'];
            $confirm_pwd = $_POST['confirm-password'];

            if (password_verify($old_password, $_SESSION['mot_de_passe']) && $new_password == $confirm_pwd) {
                $encrypted_pwd = password_hash($new_password, PASSWORD_BCRYPT);
                User::update($_SESSION['id_u'], ['mot_de_passe' => $encrypted_pwd]);

                $_SESSION['mot_de_passe'] = $encrypted_pwd;
            }
        }
        $this->security();
    }

    /**
     * @throws Exception
     */
    public function billing() {
        $nom = $prenom = $email = '';
        if ($_SESSION) {
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];
            $email = $_SESSION['email'];
        }

        $this->render('settings.billing', [
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'avatar' => 'https://www.rgd.fr/wp-content/uploads/2021/01/avatar-anonyme.png'
        ]);
    }

    public function saveBilling() {
        if (isset($_POST['save-billing'])) {
            // A faire
        }
    }
}