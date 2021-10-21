<?php

namespace App\Controllers;

//use function App\Utils\render;
use Exception;

require __DIR__.'/../Utils/functions.php';

class ErrorController
{
    /**
     * @throws Exception
     */
    public function show() {
        render('404');
    }
}