<?php

namespace App\Utils;

use App\Utils\Templates\ErrorTemplate;
use App\Utils\Templates\SuccessTemplate;
use Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException;
use Tamtamchik\SimpleFlash\Flash;

class Notify
{
    /**
     * Initialisation du moteur de notification flash (via session)
     * @param $type - error, warning, info, success
     * @param $content - array [] ou string ""
     * @throws FlashTemplateNotFoundException
     */
    public static function message($type, $content): object
    {
        switch ($type) {
            case 'error':
                flash()->error($content);
                break;
            case 'warning':
                flash()->warning($content);
                break;
            case 'info':
                flash()->info($content);
                break;
            case 'success':
                flash()->success($content);
                break;
        }

        return flash();
    }
}