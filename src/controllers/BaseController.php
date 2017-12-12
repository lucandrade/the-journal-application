<?php

namespace App\Controllers;

class BaseController
{
    protected function render($view, array $data)
    {
        $loader = new \Twig_Loader_Filesystem(APP_PATH . 'views');
        $twig = new \Twig_Environment($loader);
        return $twig->render($view, $data);
    }
}
