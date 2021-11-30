<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\User;
use App\Utils\Notify;
use Exception;

class LoginController extends Controller
{
    /**
     * Méthode d'affichage de la page avec des variables
     *
     * @return void
     * @throws Exception
     */
    public function show() {
        $this->render('auth.login');
    }

    /**
     * Méthode de connexion
     *
     * @return void
     * @throws Exception
     */
    public function login() {
        if (isset($_POST['login'])) {
            $loginEmail = $_POST['email'];
            $loginPassword = $_POST['password'];

            $user = User::select(['email' => $loginEmail]);
            
            // Si l'email et le mdp ne sont pas vide.
            if (!empty($loginEmail) && !empty($loginPassword)) {
                // Si l'email entrée ne correspond à aucun email de la bdd.
                if (isset($user[0]) <= 0) {
                    Notify::message('error', ['<p class="text-sm font-medium text-gray-900">Erreur de connexion !</p>', '<p class="mt-1 text-sm text-gray-600">Cette adresse e-mail n\'est pas enregistrée.</p>']);
                    $this->redirectTo('/settings/account');
                } else {
                    $id = $user[0]['id'];
                    $nom = $user[0]['nom'];
                    $prenom = $user[0]['prenom'];
                    $email = $user[0]['email'];
                    $avatar = $user[0]['avatar'];
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
                        
                        $_SESSION['id_u'] = $id;
                        $_SESSION['nom'] = $nom;
                        $_SESSION['prenom'] = $prenom;
                        $_SESSION['email'] = $email;
                        $_SESSION['avatar'] = $avatar;
                        $_SESSION['mot_de_passe'] = $mot_de_passe;
                        $_SESSION['numero_tel'] = $numero_tel;
                        $_SESSION['type_compte'] = $type_compte;
                        $_SESSION['cree_le'] = $cree_le;
                        $_SESSION['modifie_le'] = $modifie_le;

                        Notify::message('success', ['<p class="text-sm font-medium text-gray-900">Connexion réussi !</p>', '<p class="mt-1 text-sm text-gray-600">Bienvenue sur votre compte '.$_SESSION['prenom'].'.</p>']);
                        $this->redirectTo('/settings/account');
                    } else {
                        Notify::message('error', ['<p class="text-sm font-medium text-gray-900">Erreur de connexion !</p>', '<p class="mt-1 text-sm text-gray-600">Adresse e-mail ou mot de passe invalide.</p>']);
                        $this->redirectTo('/settings/account');
                    }
                }
            } else {
                if (empty($loginEmail)) {
                    Notify::message('error', ['<p class="text-sm font-medium text-gray-900">Erreur de saisie !</p>', '<p class="mt-1 text-sm text-gray-600">Le champs "Adresse e-mail" est vide.</p>']);
                    $this->redirectTo('/settings/account');
                }

                if (empty($loginPassword)) {
                    Notify::message('error', ['<p class="text-sm font-medium text-gray-900">Erreur de saisie !</p>', '<p class="mt-1 text-sm text-gray-600">Le champs "Mot de passe" est vide.</p>']);
                    $this->redirectTo('/settings/account');
                }
            }
        }
    }

    /**
     * Méthode de déconnexion
     *
     * @return void
     */
    public function logout() {
        session_destroy();
        //setcookie('remember-me', '');

        $this->redirectTo('/');
    }
}