<?php

namespace App\Controllers;

use App\Models\User;

//use function App\Utils\render;
require __DIR__ . '/../Utils/functions.php';

class AuthController
{
    public function show() {
        render('auth.login', [
            'titre' => 'Se connecter • ', 
            'app' => $_ENV['APP_NAME']
        ]); // [] = array()
    }

    public function login() {
        if (isset($_POST['login'])) {
            $loginEmail = $_POST['email'];
            $loginPassword = $_POST['password'];

            $infoClient = User::select(['email' => $loginEmail]);
            
            // Si l'email et le mdp ne sont pas vide.
            if (!empty($loginEmail) && !empty($loginPassword)) {
                // Si l'email entrée ne correspond à aucun email de la bdd.
                if (isset($infoClient[0]) <= 0) {
                    echo "L'utilisateur n'existe pas dans la base de données.";
                } else {
                    $id = $infoClient[0]['id'];
                    $nom = $infoClient[0]['nom'];
                    $prenom = $infoClient[0]['prenom'];
                    $email = $infoClient[0]['email'];
                    $photo = $infoClient[0]['photo'];
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
                        
                        $_SESSION['id'] = $id;
                        $_SESSION['nom'] = $nom;
                        $_SESSION['prenom'] = $prenom;
                        $_SESSION['email'] = $email;
                        $_SESSION['photo'] = $photo;
                        $_SESSION['numero_tel'] = $numero_tel;
                        $_SESSION['type_compte'] = $type_compte;
                        $_SESSION['cree_le'] = $cree_le;
                        $_SESSION['modifie_le'] = $modifie_le;

                        header("Location: /settings/account");
                    } else {
                        echo "Email ou mot de passe invalide.";
                    }
                }
            } else {
                if (empty($loginEmail)) {
                    echo "Email non fourni.";
                }

                if (empty($loginPassword)) {
                    echo "Mot de passe non fourni.";
                }
            }
        }
    }

    public function logout() {
        session_destroy();
        //setcookie('remember-me', '');

        header('Location: /');
    }
}