<?php

use App\Exceptions\GenericException;

if (!function_exists('env')) {
    function env()
    {
        $filePath = BASE_PATH . '.env';

        if (!file_exists($filePath)) {
            throw new GenericException("The configuration file wasn't found");
        } else if (!is_readable($filePath)) {
            throw new GenericException("The configuration file could not be opened");
        }

        return parse_ini_file($filePath, true);
    }
}
