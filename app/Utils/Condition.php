<?php

namespace App\Utils;

class Condition
{
    /**
     * Si l'utilisateur est connecté et a le rôle précisé
     * @param string $role (optionnel)
     * @return bool
     */
    static function isAuth(string $role = 'vacancier'): bool
    {
        if (!empty($_SESSION['id_u'])) {
            // Connecté
            return true;
        } else {
            // Déconnecté
            return false;
        }
    }

    static function asRole(string $role = 'vacancier'): bool
    {
        if (!empty($_SESSION['id_u'])) {
            // Connecté
            return match ($_SESSION['type_compte'] == $role) {
                false => false,
                true => true,
            };
        } else {
            // Déconnecté
            return false;
        }
    }
}