<?php

namespace App\Controllers;

use App\Models\User;
use App\Utils\Condition;
use eftec\bladeone\BladeOne;
use eftec\ValidationOne;
use Exception;
use Tamtamchik\SimpleFlash\Flash;

class Controller
{
    /**
     * Rendu des vues/pages avec le système Blade
     * @param string $template
     * @param array $params
     * @return void
     * @throws Exception
     */
    public function render(string $template, array $params = []): void
    {
        global $blade;
        if ($blade === null) {
            $views = __DIR__.'/../../views';
            $cache = __DIR__.'/../../storage/cache';

            if (Condition::isAuth()) {
                if ($_SESSION['avatar'] == 'NULL' || $_SESSION['avatar'] == null || $_SESSION['avatar'] == 0) {
                    $avatar = 'https://www.rgd.fr/wp-content/uploads/2021/01/avatar-anonyme.png';
                } else {
                    $avatar = $_SESSION['avatar'];
                }
            } else $avatar = '';

            $blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);
            $blade->addAssetDict([
                'tailwindcss' => '../assets/css/compiled.min.css',
                'styles' => '../assets/css/styles.css',
                'app' => '../assets/js/app.js',
                'favicon' => '../assets/images/brand/cube.png',
                'logo_teal_dark' => '../assets/images/brand/logo_teal_dark.png',
                'logo_teal_light' => '../assets/images/brand/logo_teal_light.png',
                'logo_dark' => '../assets/images/brand/logo_dark.png',
                'logo_light' => '../assets/images/brand/logo_light.png'
            ]);
        }

        if (Condition::isAuth() && Condition::asRole(['admin'])) {
            $blade->setAuth($_SESSION['id_u'], 'admin');
        } else if (Condition::isAuth() && Condition::asRole(['gestion'])) {
            $blade->setAuth($_SESSION['id_u'], 'gestion');
        } else if (Condition::isAuth() && Condition::asRole(['vacancier'])) {
            $blade->setAuth($_SESSION['id_u'], 'vacancier');
        }

        $defaultParams = ['app' => $_ENV['APP_NAME'], 'avatar' => $avatar ?? ''];
        $mergedParams = array_merge($params, $defaultParams);

        echo $blade->run($template, $mergedParams);
    }
    
    /**
     * @return ValidationOne
     */
    public function validation(): \eftec\ValidationOne
    {
        global $validation;
        if ($validation === null) {
            $validation = new ValidationOne();
        }
        return $validation;
    }

    /**
     * @param $route - url de redirection
     * @return void
     */
    public function redirectTo($route): void
    {
        header('Location:'.$route);
    }
}