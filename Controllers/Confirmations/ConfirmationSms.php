<?php

namespace Controllers\Confirmations;

use Controllers\Confirmations\Interfaces\Sms;
use Controllers\Factories\ConfirmationFactories;
use Core\Facades\Response;
use Helpers\Helper;

class ConfirmationSms extends ConfirmationFactories implements Sms
{
    public function getSmsCode()
    {
        $code = rand(1000, 9999);
        $_SESSION['sms_code'] = $code;
        Response::response($code);
    }

    public function checkSmsCode($code)
    {
        if ($_SESSION['sms_code'] == $code) return true;

        return false;
    }
}
