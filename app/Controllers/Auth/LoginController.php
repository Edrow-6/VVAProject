<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\User;
use App\Utils\Notify;
use Exception;
use Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException;

class LoginController extends Controller
{
    /**
     * Méthode d'affichage de la page avec des variables
     *
     * @return void
     * @throws Exception
     */
    public function show()
    {
        $this->render('auth.pages.login');
    }

    /**
     * Méthode de connexion
     *
     * @return void
     * @throws Exception
     */
    public function login()
    {
        if (isset($_POST['login'])) {
            $loginEmail = $_POST['email'];
            $loginPassword = $_POST['password'];

            $user = User::select(['email' => $loginEmail]);

            // Si l'email et le mdp ne sont pas vide.
            if (!empty($loginEmail) && !empty($loginPassword)) {
                // Si l'email entrée ne correspond à aucun email de la bdd.
                if (isset($user[0]) <= 0) {
                    Notify::message('error', 'Adresse e-mail erronée !');
                    $this->redirectTo('/auth/login');
                } else {
                    $id = $user[0]['id'];
                    $nom = $user[0]['nom'];
                    $prenom = $user[0]['prenom'];
                    $email = $user[0]['email'];
                    $avatar = $_ENV['APP_URL'] . '/assets/images/uploads/avatars/' . $user[0]['avatar'];
                    $mot_de_passe = $user[0]['mot_de_passe'];
                    $numero_tel = $user[0]['numero_tel'];
                    $type_compte = $user[0]['type_compte'];
                    $cree_le = $user[0]['cree_le'];
                    $modifie_le = $user[0]['modifie_le'];

                    $password = password_verify($loginPassword, $mot_de_passe);

                    if ($loginEmail == $email && $loginPassword == $password) {
                        if (!empty($_POST['remember-me'])) {
                            \setcookie('remember-me', $email, time() + (10 * 365 * 24 * 60 * 60));
                        } elseif (isset($_COOKIE['remember-me'])) {
                            \setcookie('remember-me', '');
                        }

                        session([
                            'uid' => $id,
                            'nom' => $nom,
                            'prenom' => $prenom,
                            'email' => $email,
                            'avatar' => $avatar,
                            'mot_de_passe' => $mot_de_passe,
                            'numero_tel' => $numero_tel,
                            'type_compte' => $type_compte,
                            'cree_le' => $cree_le,
                            'modifie_le' => $modifie_le
                        ]);

                        Notify::message('info', 'Bien le bonjour ' . session('prenom') . ' !');
                        $this->redirectTo('/');
                    } else {
                        Notify::message('error', 'Informations erronées !');
                        $this->redirectTo('/auth/login');
                    }
                }
            } else {
                if (empty($loginEmail)) {
                    Notify::message('error', 'Champs de saisie vide !');
                    $this->redirectTo('/auth/login');
                }

                if (empty($loginPassword)) {
                    Notify::message('error', 'Champs de saisie vide !');
                    $this->redirectTo('/auth/login');
                }
            }
        }

        if (isset($_POST['demo'])) {
            // TODO: Demo user login
        }
    }

    /**
     * Méthode de déconnexion
     *
     * @return void
     * @throws FlashTemplateNotFoundException
     */
    public function logout()
    {
        @session_destroy();
        @session_start();

        Notify::message('info', 'Vous avez été déconnecté !');
        $this->redirectTo('/');
    }
}
