<?php

namespace App\Controllers;

use App\Models\User;
use Exception;

//use function App\Utils\render;
require __DIR__ . '/../Utils/functions.php';

class SettingsController
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

        render('settings.account', [
            'flash' => $flash,
            'nom' => $nom, 
            'prenom' => $prenom,
            'email' => $email,
            'numero_tel' => $numero_tel,
            //'avatar' => "../assets/uploads/avatars/{$_SESSION['avatar']}"
            'avatar' => 'https://www.rgd.fr/wp-content/uploads/2021/01/avatar-anonyme.png'
        ]);
    }

    /**
     * @throws Exception
     */
    public function saveAccount() {
        if (isset($_POST['save-account'])) {
            User::update($_SESSION['id_u'], ['nom' => $_POST['last-name'], 'prenom' => $_POST['first-name'], 'email' => $_POST['email-address'], 'numero_tel' => $_POST['phone-number']]);

            $_SESSION['nom'] = $_POST['last-name'];
            $_SESSION['prenom'] = $_POST['first-name'];
            $_SESSION['email'] = $_POST['email-address'];
            $_SESSION['numero_tel'] = $_POST['phone-number'];

            $target = __DIR__.'/../../storage/uploads/avatars/';
            //symlink($target, __DIR__.'/../../public/assets/uploads/avatars/link');

            $filename = md5($_SESSION['prenom'].$_SESSION['nom']);
            //$filename = basename($_FILES["user-photo"]["name"]);
            $filetype = pathinfo(basename($_FILES["user-photo"]["name"]), PATHINFO_EXTENSION);
            $final_filename = "$filename.$filetype";
            $final_url = "$target$filename.$filetype";

            if (!empty($_FILES['user-photo']['name'])) {
                $allowTypes = array('png', 'jpg', 'jpeg', 'gif');
                if (!file_exists($final_url)) {
                    if (in_array($filetype, $allowTypes)) {
                        if (move_uploaded_file($_FILES['user-photo']['tmp_name'], $final_url)) {
                            User::update($_SESSION['id'], ['photo' => $final_filename]);
                            $this->account();
                        } else {
                            echo 'Veuillez choisir un fichier a upload';
                        }
                    } else {
                        echo 'Erreur type';
                    }
                } else {
                    echo 'Le fichier existe deja';
                }
            }

            /*if (!empty($_FILES['user-photo']['name'])) {
                $filename = md5($_SESSION['nom'].$_SESSION['prenom']);
                if (move_uploaded_file($_FILES['user-photo']['tmp_name'], `storage/uploads/{$filename}`)) {
                    echo 'Upload réussi !';
                }
            } else {
                echo 'NOPE';
            }*/
        }

        $flash = notifySuccess()->message(['<p class="text-sm font-medium text-gray-900">Sauvegarde réussi !</p>', '<p class="mt-1 text-sm text-gray-600">Vous informations de compte on été validées avec succès.</p>'], 'error');
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
        
        render('settings.security', [
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

        render('settings.billing', [
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