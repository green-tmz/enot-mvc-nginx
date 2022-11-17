<?php

namespace Core;

class View
{
    /**
     * @param string $path
     * @param array $data
     * @throws \ErrorException
     */
    public static function render(string $path, array $data = [])
    {
        $fullPath = dirname(__DIR__, 1) . '/Views/' . $path . '.php';

        if (!file_exists($fullPath)) {
            throw new \ErrorException('view cannot be found');
        }

        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $$key = $value;
            }
        }

        include($fullPath);
    }
}
