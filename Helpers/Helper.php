<?php

namespace Helpers;

class Helper
{
    public static function wtf($data)
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die;
    }

    public static function json($data)
    {
        return json_encode($data, 200);
    }
}
