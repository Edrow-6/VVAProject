<?php

declare(strict_types=1);

namespace App\Utils;

use eftec\PdoOne;
use eftec\ValidationOne;
use Exception;

class Functions
{
    public $blade = null;
    public $pdo = null;
    public $validation = null;

    /**
     * Initialisation de la base de données avec PDO
     * @return PdoOne
     * @throws Exception
     */
    function database(): \eftec\PdoOne
    {
        // Fichier de configurations avec les variables .env
        $config = require __DIR__.'/../../config/app.php';

        global $pdo;
        if ($pdo === null) {
            $pdo = new PdoOne("mysql", $config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
            $pdo->logLevel = 4; // Utile pour debug et permet de trouver les problèmes en rapport avec les requêtes MySQL. 1 = prod | 4 = dev
            $pdo->open();
        }

        return $pdo;
    }

    /**
     * Si l'utilisateur est connecté et a le rôle précisé
     * @param string $role (optionnel)
     * @return bool
     */
    function isAuth(string $role = 'vacancier'): bool
    {
        if (!empty($_SESSION['id_u'])) {
            // Connecté
            return match ($_SESSION['type_compte']  == $role) {
                false => false,
                true => true,
            };
        } else {
            // Déconnecté
            return false;
        }
    }

    /**
     * Validation des entrées (input) avec des conditions
     * @return ValidationOne
     */
    function validation(): \eftec\ValidationOne
    {
        global $validation;
        if ($validation === null) {
            $validation = new ValidationOne();
        }
        return $validation;
    }
}