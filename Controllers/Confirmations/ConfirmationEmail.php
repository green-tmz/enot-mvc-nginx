<?php

namespace Controllers\Confirmations;

use Core\Facades\Response;
use Controllers\Confirmations\Interfaces\Email;
use Controllers\Factories\ConfirmationFactories;

class ConfirmationEmail extends ConfirmationFactories implements Email
{
    public function getEmailCode()
    {
        $code = rand(1000, 9999);
        $_SESSION['email_code'] = $code;
        Response::response($code);
    }

    public function checkEmailCode($code)
    {
        if ($_SESSION['email_code'] == $code) return true;

        return false;
    }
}
