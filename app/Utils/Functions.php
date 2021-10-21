<?php

declare(strict_types=1);

namespace App\Utils;

use eftec\PdoOne;
use Tamtamchik\SimpleFlash\Flash;
use eftec\ValidationOne;
use App\Utils\ErrorTemplate;
use App\Utils\SuccessTemplate;

class Functions
{
    public $blade = null;
    public $pdo = null;
    public $validation = null;

    /**
     * Initialisation de la base de données avec PDO
     * @return eftec\PdoOne
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
     * Initialisation du moteur de notification flash (via session)
     * @return object
     */
    function notifyError(): object
    {
        $flash = new Flash();
        $flash->setTemplate(new ErrorTemplate());

        return $flash;
    }

    /**
     * @return object
     */
    function notifySuccess(): object
    {
        $flash = new Flash();
        $flash->setTemplate(new SuccessTemplate());

        return $flash;
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
     * @return eftec\ValidationOne
     */
    function validation(): \eftec\ValidationOne
    {
        global $validation;
        if ($validation === null) {
            $validation = new ValidationOne();
        }
        return $validation;
    }

    /**
     * Affiche une bannière pour debugger une variable ou une fonction
     * @param string $type
     * @param void $function
     * @return void
     */
    function debug(string $type, $function): void
    {
        if ($_ENV['APP_DEBUG']) {
            $type = match ($type) {
                'error' => 'red',
                'debug' => 'indigo',
                'info' => 'blue',
                'notice' => 'green',
                'warning' => 'yellow',
            };

            echo <<<EOF
                <div class="fixed inset-x-0 bottom-0 z-50">
                <div class="bg-$type-600">
                <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between flex-wrap">
                <div class="w-0 flex-1 flex items-center">
                <span class="flex p-2 rounded-lg bg-$type-800">
                <i class="fad fa-debug text-white"></i>
                </span>
                <p class="ml-3 font-medium text-white truncate">
                <span class="md:hidden">
                DEBUG
                </span>
                <span class="hidden md:inline">
            EOF;
            var_dump($function);
            echo <<<EOF
                </span>
                </p>
                </div>
                <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
                <form method="POST" class="mb-0">
                <input type="hidden" name="pastebin">
                <button type="submit" id="pastebin" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-$type-600 bg-white hover:bg-indigo-50">
                Pastebin <!-- Plus d'infos -->
                </button>
                </form>
                </div>
                <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-$type-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                <span class="sr-only">Dismiss</span>
                <i class="fal fa-times text-white"></i>
                </button>
                </div>
                </div>
                </div>
                </div>
                </div>
            EOF;
        }
    }
}