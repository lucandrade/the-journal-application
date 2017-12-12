<?php

require_once __DIR__ . '/bootstrap/autoload.php';

$dispatcher = require_once APP_PATH . 'dispatcher.php';
$dispatcher->send();
