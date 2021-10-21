<?php

namespace App\Controller;

use eftec\bladeone\BladeOne;

class Controller
{
    public $blade = null;

    /**
     * Rendu des vues/pages avec le système Blade
     * @param string $template
     * @param array $params
     * @return void
     * @throws Exception
     */
    function render(string $template, array $params = []): void
    {
        global $blade;
        if ($blade === null) {
            $views = __DIR__.'/../../views';
            $cache = __DIR__.'/../../storage/cache';

            $blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);
            $blade->addAssetDict([
                'tailwindcss' => '../assets/css/compiled.min.css',
                'fontawesomepro' => '../assets/css/all.min.css',
                'app' => '../assets/js/app.js',
                'favicon' => '../assets/images/favicon-32x32.png',
                'logo_teal_dark' => '../assets/images/logo_teal_dark.png',
                'logo_teal_light' => '../assets/images/logo_teal_light.png',
                'logo_dark' => '../assets/images/logo_dark.png',
                'logo_light' => '../assets/images/logo_light.png'
            ]);
        }

        if (->isAuth('admin')) {
            $blade->setAuth($_SESSION['id_u'], 'admin');
        } else if ($this->isAuth('gestion')) {
            $blade->setAuth($_SESSION['id_u'], 'gestion');
        } else if ($this->isAuth()) {
            $blade->setAuth($_SESSION['id_u'], 'vacancier');
        }

        $defaultParams = ['app' => $_ENV['APP_NAME']];
        $mergedParams = array_merge($params, $defaultParams);

        echo $blade->run($template, $mergedParams);
    }
}