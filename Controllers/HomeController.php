<?php

namespace Controllers;

use Controllers\Dictionaries\Confirmation;
use Controllers\Dictionaries\Settings;
use Core\View;
use Helpers\Helper;

class HomeController
{
    public function Index()
    {
        View::render('index', [
            'settings' => Settings::SETTINGS,
            'confirmations' => Confirmation::TYPE
        ]);
    }
}
