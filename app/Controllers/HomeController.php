<?php

namespace App\Controllers;

//use function App\Utils\render;
require __DIR__.'/../Utils/functions.php';

class HomeController
{
    public function show() {
        $nom = $prenom = '';
        if ($_SESSION) {
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];
        }

        render('home', [
            'titre' => 'Accueil • ', 
            'app' => $_ENV['APP_NAME'], 
            'nom' => $nom, 
            'prenom' => $prenom
        ]); // [] = array()
    }
    
    public function pastebin() {
        $message = $_SESSION; // En Dev
        $format = 'php'; // En Dev

        if (isset($_POST['pastebin'])) {
            $api_dev_key = $_ENV['PB_API_DEV_KEY']; // Clé api developpeur défini dans l'environnement
            if (is_array($message)) {
                $api_paste_code = implode("\n ", $message);
            } else {
                $api_paste_code = $message; // Contenu du pastebin
            }
            $api_paste_private = '1'; // 0=public 1=unlisted 2=private
            $api_paste_name = 'test.php'; // Nom du fichier / Pastebin
            $api_paste_expire_date = '10M'; // Date d'expiration du Pastebin (contenu + lien)
            $api_paste_format = $format; // Format du Pastebin (ex: php)
            $api_user_key = ''; // Vide
        
            $api_paste_name	= urlencode($api_paste_name);
            $api_paste_code	= urlencode($api_paste_code);

            $url = $_ENV['PB_API_URL']; // Url de l'api défini dans l'environnement
            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'api_option=paste&api_user_key='.$api_user_key.'&api_paste_private='.$api_paste_private.'&api_paste_name='.$api_paste_name.'&api_paste_expire_date='.$api_paste_expire_date.'&api_paste_format='.$api_paste_format.'&api_dev_key='.$api_dev_key.'&api_paste_code='.$api_paste_code.'');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_VERBOSE, 1);
            curl_setopt($ch, CURLOPT_NOBODY, 0);

            $response = curl_exec($ch);
            echo $response;
        }
    }
}