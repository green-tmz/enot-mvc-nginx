<?php

namespace Controllers\Confirmations\Interfaces;

interface Sms
{
    public function getSmsCode();
    public function checkSmsCode($code);
}
