<?php

namespace App\Controllers;

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
    public function show($flash = '') {
        $this->render('auth.login', [
            'flash' => $flash
        ]);
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

            $infoClient = User::select(['email' => $loginEmail]);
            
            // Si l'email et le mdp ne sont pas vide.
            if (!empty($loginEmail) && !empty($loginPassword)) {
                // Si l'email entrée ne correspond à aucun email de la bdd.
                if (isset($infoClient[0]) <= 0) {
                    $flash = Notify::error()->message(['<p class="text-sm font-medium text-gray-900">Erreur de connexion !</p>', '<p class="mt-1 text-sm text-gray-600">Cette adresse e-mail n\'est pas enregistrée.</p>']);
                    $this->show($flash);
                } else {
                    $id = $infoClient[0]['id'];
                    $nom = $infoClient[0]['nom'];
                    $prenom = $infoClient[0]['prenom'];
                    $email = $infoClient[0]['email'];
                    $avatar = $infoClient[0]['avatar'];
                    $mot_de_passe = $infoClient[0]['mot_de_passe'];
                    $numero_tel = $infoClient[0]['numero_tel'];
                    $type_compte = $infoClient[0]['type_compte'];
                    $cree_le = $infoClient[0]['cree_le'];
                    $modifie_le = $infoClient[0]['modifie_le'];

                    $password = password_verify($loginPassword, $mot_de_passe);

                    if ($loginEmail == $email && $loginPassword == $password) {
                        if (!empty($_POST['remember-me'])) {
                            setcookie('remember-me', $email, time() + (10 * 365 * 24 * 60 * 60));
                        } elseif (isset($_COOKIE['remember-me'])) {
                            setcookie('remember-me', '');
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

                        header("Location: /settings/account");
                    } else {
                        $flash = Notify::error()->message(['<p class="text-sm font-medium text-gray-900">Erreur de connexion !</p>', '<p class="mt-1 text-sm text-gray-600">Adresse e-mail ou mot de passe invalide.</p>']);
                        $this->show($flash);
                    }
                }
            } else {
                if (empty($loginEmail)) {
                    $flash = Notify::error()->message(['<p class="text-sm font-medium text-gray-900">Erreur de saisie !</p>', '<p class="mt-1 text-sm text-gray-600">Le champs "Adresse e-mail" est vide.</p>']);
                    $this->show($flash);
                }

                if (empty($loginPassword)) {
                    $flash = Notify::error()->message(['<p class="text-sm font-medium text-gray-900">Erreur de saisie !</p>', '<p class="mt-1 text-sm text-gray-600">Le champs "Mot de passe" est vide.</p>']);
                    $this->show($flash);
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

        header('Location: /');
    }
}