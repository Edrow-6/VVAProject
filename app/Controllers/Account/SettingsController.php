<?php

namespace App\Controllers\Account;

use App\Controllers\Controller;
use App\Models\User;
use App\Utils\Logging;
use App\Utils\Notify;
use Exception;

class SettingsController extends Controller
{
    /**
     * @throws Exception
     */
    public function show(){
        $this->render('account.pages.settings', [
            'nom' => $_SESSION['nom'] ?? '',
            'prenom' => $_SESSION['prenom'] ?? '',
            'email' => $_SESSION['email'] ?? '',
            'numero_tel' => $_SESSION['numero_tel'] ?? ''
        ]);
    }

    /**
     * @throws Exception
     */
    public function save() {
        if (isset($_POST['save-settings'])) {
            $nom = $this->validation()->def($_SESSION['nom'])->type('string')->ifFailThenDefault()->post('last-name');
            $prenom = $this->validation()->def($_SESSION['prenom'])->type('string')->ifFailThenDefault()->post('first-name');
            $email = $this->validation()->def($_SESSION['email'])->type('string')->ifFailThenDefault()->post('email-address');
            $num_tel = $this->validation()->def($_SESSION['numero_tel'])->type('string')->ifFailThenDefault()->post('phone-number');

            User::update($_SESSION['id_u'], ['nom' => $nom, 'prenom' => $prenom, 'email' => $email, 'numero_tel' => $num_tel]);

            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['email'] = $email;
            $_SESSION['numero_tel'] = $num_tel;

            $target = __DIR__.'/../../../public/assets/images/uploads/avatars/';
            $filename = md5($prenom.$nom);
            //$filename = basename($_FILES["user-photo"]["name"]);
            $filetype = pathinfo(basename($_FILES["user-photo"]["name"]), PATHINFO_EXTENSION);
            $file = "$filename.$filetype";
            $directory = "$target$filename.$filetype";

            if (!empty($_FILES['user-photo']['name'])) {
                $allowTypes = array('png', 'jpg', 'jpeg', 'gif');
                //if (!file_exists($final_url)) {
                if (in_array($filetype, $allowTypes)) {
                    if (move_uploaded_file($_FILES['user-photo']['tmp_name'], $directory)) {
                        User::update($_SESSION['id_u'], ['avatar' => $file]);

                        $url = $_ENV['APP_URL'].'/assets/images/uploads/avatars/'.$file;
                        $_SESSION['avatar'] = $url;
                        Logging::log()->info('Définition de l\'avatar: '.$url);
                    } else {
                        Notify::message('error', 'Image invalide !');
                    }
                } else {
                    Notify::message('error', `Format de l'image incorrect !`);
                }
                //} else {
                //    Notify::message('error', 'Cette avatar existe déjà.');
                //}
            }
        }

        Notify::message('success', 'Sauvegarde réussie !');
        $this->redirectTo('/account/settings');
    }
}