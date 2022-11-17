<?php

$app->router->get('/home', function () {
    return "Ok";
});

$app->router->get('/', ['HomeController' => 'index']);
$app->router->get('/settings', ['SettingsController' => 'index']);
$app->router->get('/settings/get-all', ['SettingsController' => 'getAll']);
$app->router->post('/settings/get-code', ['SettingsController' => 'getCode']);
$app->router->post('/settings/save', ['SettingsController' => 'save']);
