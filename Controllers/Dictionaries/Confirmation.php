<?php

namespace Controllers\Dictionaries;

abstract class Confirmation
{
    const TYPE = [
        1 => 'sms',
        2 => 'email',
        3 => 'telegram'
    ];
}
