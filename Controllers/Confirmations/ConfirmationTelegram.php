<?php

namespace Controllers\Confirmations;

use Core\Facades\Response;
use Controllers\Factories\ConfirmationFactories;
use Controllers\Confirmations\Interfaces\Telegram;

class ConfirmationTelegram extends ConfirmationFactories implements Telegram
{
    public function getTelegramCode()
    {
        $code = rand(1000, 9999);
        $_SESSION['telegram_code'] = $code;
        Response::response($code);
    }

    public function checkTelegramCode($code)
    {
        if ($_SESSION['telegram_code'] == $code) return true;

        return false;
    }
}
