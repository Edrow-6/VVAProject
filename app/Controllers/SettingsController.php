<?php

namespace App\Controllers;

use App\Models\User;

//use function App\Utils\render;
require __DIR__ . '/../Utils/functions.php';

class SettingsController
{
    public function account(){
        //debug('debug', $_SESSION);
        $nom = $prenom = $email = $numero_tel = '';
        if ($_SESSION) {
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];
            $email = $_SESSION['email'];
            $numero_tel = $_SESSION['numero_tel'];
        }

        render('settings.account', [
            'titre' => 'Paramètres Compte • ', 
            'app' => $_ENV['APP_NAME'], 
            'page' => 'account',
            'nom' => $nom, 
            'prenom' => $prenom,
            'email' => $email,
            'numero_tel' => $numero_tel,
            //'avatar' => "../assets/uploads/avatars/{$_SESSION['avatar']}"
            'avatar' => 'https://www.rgd.fr/wp-content/uploads/2021/01/avatar-anonyme.png'
        ]); // [] = array()
    }

    public function saveAccount() {
        if (isset($_POST['save-account'])) {
            User::update($_SESSION['id'], ['nom' => $_POST['last-name'], 'prenom' => $_POST['first-name'], 'email' => $_POST['email-address'], 'numero_tel' => $_POST['phone-number']]);

            $_SESSION['nom'] = $_POST['last-name'];
            $_SESSION['prenom'] = $_POST['first-name'];
            $_SESSION['email'] = $_POST['email-address'];
            $_SESSION['numero_tel'] = $_POST['phone-number'];

            $target = __DIR__.'/../../storage/uploads/avatars/';
            symlink($target, __DIR__.'/../../public/assets/uploads/avatars/link');

            $filename = md5($_SESSION['prenom'].$_SESSION['nom']);
            //$filename = basename($_FILES["user-photo"]["name"]);
            $filetype = pathinfo(basename($_FILES["user-photo"]["name"]), PATHINFO_EXTENSION);
            $final_filename = "{$filename}.{$filetype}";
            $final_url = "{$target}{$filename}.{$filetype}";

            if (!empty($_FILES['user-photo']['name'])) {
                $allowTypes = array('png', 'jpg', 'jpeg', 'gif');
                if (!file_exists($final_url)) {
                    if (in_array($filetype, $allowTypes)) {
                        if (move_uploaded_file($_FILES['user-photo']['tmp_name'], $final_url)) {
                            User::update($_SESSION['id'], ['photo' => $final_filename]);
                            header("Location: /settings/account");
                        } else {
                            echo 'Veuillez choisir un fichier a upload';
                        }
                    } else {
                        echo 'Erreur type';
                    }
                } else {
                    echo 'Le fichier existe deja';
                }
            } else {
                echo 'Input Avatar vide';
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
        //header('Location: /settings/account');
    }

    public function security() {
        $nom = $prenom = $email = '';
        if ($_SESSION) {
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];
            $email = $_SESSION['email'];
        }
        
        render('settings.security', [
            'titre' => 'Paramètres Sécurité • ', 
            'app' => $_ENV['APP_NAME'], 
            'page' => 'security',
            'nom' => $nom, 
            'prenom' => $prenom,
            'email' => $email
        ]); // [] = array()
    }

    public function saveSecurity() {
        if (isset($_POST['save-security'])) {
            $old_password = $_POST['old-password'];
            $new_password = $_POST['new-password'];
            $confirm_pwd = $_POST['confirm-password'];

            if (password_verify($old_password, $_SESSION['mot_de_passe']) && $new_password == $confirm_pwd) {
                $encrypted_pwd = password_hash($new_password, PASSWORD_BCRYPT);
                User::update($_SESSION['id'], ['mot_de_passe' => $encrypted_pwd]);

                $_SESSION['mot_de_passe'] = $encrypted_pwd;
            }
        }
        header('Location: /settings/security');
    }

    public function billing() {
        $nom = $prenom = $email = '';
        if ($_SESSION) {
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];
            $email = $_SESSION['email'];
        }

        render('settings.billing', [
            'titre' => 'Paramètres Facturation • ', 
            'app' => $_ENV['APP_NAME'], 
            'page' => 'billing',
            'nom' => $nom, 
            'prenom' => $prenom,
            'email' => $email
        ]); // [] = array()
    }

    public function saveBilling() {
        if (isset($_POST['save-billing'])) {
            // COMMING SOON
        }
    }
}