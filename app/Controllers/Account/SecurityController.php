<?php

namespace App\Controllers\Account;

use App\Controllers\Controller;
use App\Models\User;
use Exception;

class SecurityController extends Controller
{
    /**
     * @throws Exception
     */
    public function show() {

        $this->render('account.pages.security', [
            'nom' => $_SESSION['nom'] ?? '',
            'prenom' => $_SESSION['prenom'] ?? '',
            'email' => $_SESSION['email'] ?? '',
            'avatar' => 'https://www.rgd.fr/wp-content/uploads/2021/01/avatar-anonyme.png'
        ]);
    }

    /**
     * @throws Exception
     */
    public function save() {
        if (isset($_POST['save-security'])) {
            $old_password = $_POST['old-password'] ?? '';
            $new_password = $_POST['new-password'] ?? '';
            $confirm_pwd = $_POST['confirm-password'] ?? '';

            if (password_verify($old_password, $_SESSION['mot_de_passe']) && $new_password == $confirm_pwd) {
                $encrypted_pwd = password_hash($new_password, PASSWORD_BCRYPT);
                User::update($_SESSION['id_u'], ['mot_de_passe' => $encrypted_pwd]);

                $_SESSION['mot_de_passe'] = $encrypted_pwd;
            }
        }
        $this->redirectTo('/account/security');
    }
}