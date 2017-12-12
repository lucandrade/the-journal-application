<?php

define('DS', DIRECTORY_SEPARATOR, true);
define('BASE_PATH', __DIR__ . DS . '..' . DS, true);
define('APP_PATH', BASE_PATH . 'src' . DS, true);

require_once BASE_PATH . 'vendor/autoload.php';

require_once APP_PATH . 'helpers.php';
