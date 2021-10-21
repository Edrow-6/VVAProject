<?php

namespace App\Controllers;

//use function App\Utils\render;
use Exception;

class ErrorController extends Controller
{
    /**
     * @throws Exception
     */
    public function show($flash = '') {
        $this->render('404', ['flash' => $flash]);
    }
}