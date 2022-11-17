<?php

namespace Controllers\Factories;

use Helpers\Helper;
use Core\Facades\Response;

abstract class ConfirmationFactories
{
    public function __construct()
    {
    }

    public static function build($type = '')
    {
        if ($type == '') {
            throw new \Exception('Не верный тип подтверждения');
        } else {
            $className = 'Controllers\Confirmations\Confirmation' . ucfirst($type);
            if (class_exists($className)) return new $className();
            throw new \Exception('Подтверждение с таким типом не найдено');
        }
    }

    public static function getCode($type = '')
    {
        $className = 'Controllers\Confirmations\Confirmation' . ucfirst($type);
        $action = 'get' . ucfirst($type) . 'Code';

        if (!method_exists($className, $action))
            Response::error('Action not found', 404);

        if (class_exists($className)) {
            $class = new $className();
            $class->$action;
        };
    }
}
