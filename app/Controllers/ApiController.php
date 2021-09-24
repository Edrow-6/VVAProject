<?php

namespace App\Controllers;

use League\OAuth2\Client\Provider\Github;
use League\OAuth2\Client\Provider\Google;
use \Exception;

//use function App\Utils\render;

class ApiController
{
    public function github() {
        $provider = new Github([
            'clientId' => $_ENV['GH_CLIENT_ID'],
            'clientSecret' => $_ENV['GH_CLIENT_SECRET'],
            'redirectUri' => $_ENV['GH_REDIRECT_URI'],
        ]);
        
        if (!isset($_GET['code'])) {
            // Si le code d'autorisation n'existe pas, il faut en obtenir un.
            $authUrl = $provider->getAuthorizationUrl(['scope' => ['user','user:email']]);
            $_SESSION['oauth2_state'] = $provider->getState();
            header('Location: '.$authUrl);
            exit;
        
        // Vérification de l'état donné par rapport à l'état précédemment stocké afin d'atténuer l'attaque CSRF.
        } elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2_state'])) {
            unset($_SESSION['oauth2_state']);
            exit('État non valide');
        } else {
            // Essaie d'obtenir un jeton d'accès (en utilisant le code d'autorisation)
            $token = $provider->getAccessToken('authorization_code', [
                'code' => $_GET['code']
            ]);
            // Facultatif : Maintenant que le jeton est disponible, il est possible de consulter les données du profil de l'utilisateur.
            try {
                // Le jeton d'accès a été obtenu, il faut maintenant obtenir les détails de l'utilisateur.
                $user = $provider->getResourceOwner($token);
                // Utilisez ces informations pour créer un nouveau profil
                printf('Bonjour %s ! : ', $user->getNickname());
                var_dump($user->toArray());
            } catch (Exception $e) {
                // Échec de la récupération des détails de l'utilisateur
                exit('Une erreur est survenue durant la récupération des détails de vos informations.');
            }
            // Permet d'interagir avec l'API au nom de l'utilisateur.
            if (empty($_SESSION['oauth2_token'])) {
                $_SESSION['oauth2_token'] = $token->getToken();
            }
            echo $token->getToken();
        }
    }

    public function google() {
        $provider = new Google([
            'clientId' => $_ENV['GG_CLIENT_ID'],
            'clientSecret' => $_ENV['GG_CLIENT_SECRET'],
            'redirectUri' => $_ENV['GG_REDIRECT_URI'],
        ]);
    }
}