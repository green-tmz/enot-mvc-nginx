<?php

declare(strict_types=1);
ini_set('display_errors', 'Off');

session_start();

use Core\App;

require_once __DIR__ . '/Core/autoload.php';

$app = new App();
require_once __DIR__ . '/Routes/Web.php';

$app->run();
