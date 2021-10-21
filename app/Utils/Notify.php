<?php

namespace App\Utils;

use Tamtamchik\SimpleFlash\Flash;

class Notify
{
    /**
     * Initialisation du moteur de notification flash (via session)
     * @return object
     */
    public static function error(): object
    {
        $flash = new Flash();
        $flash->setTemplate(new ErrorTemplate());

        return $flash;
    }

    /**
     * @return object
     */
    public static function success(): object
    {
        $flash = new Flash();
        $flash->setTemplate(new SuccessTemplate());

        return $flash;
    }
}