<?php

namespace App\Utils;

class Condition
{
    /**
     * Si l'utilisateur est connecté
     * @return bool
     */
    static function isAuth(): bool
    {
        if (!empty(session('uid'))) {
            // Connecté
            return true;
        } else {
            // Déconnecté
            return false;
        }
    }

    /**
     * Si l'utilisateur à le rôle ou les rôles
     * @param array $role • ['role1', 'role2']
     * @return bool
     */
    static function asRole(array $role = []): bool
    {
        if (!empty(session('uid'))) {
            // Connecté
            return match ($_SESSION['type_compte'] == in_array($_SESSION['type_compte'], $role)) {
                false => false,
                true => true,
            };
        } else {
            // Déconnecté
            return false;
        }
    }
}