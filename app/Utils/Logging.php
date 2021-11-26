<?php

namespace App\Utils;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Logging
{
    public static function log(): object
    {
        $log = new Logger('app');
        $log->pushHandler(new StreamHandler(__DIR__.'/../../console.log', Logger::WARNING));

        return $log;
    }
}
