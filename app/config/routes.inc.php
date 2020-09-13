<?php

use App\Core\Router\RouteCollection;
use App\Core\Router\Route;

Route::setPrefix('cv-generator');

$routes = new RouteCollection();

/* Auth routes */

$routes->add('login', "login/")
    ->setController(\App\Controller\AuthController::class)
    ->setAction('login');

$routes->add('signup', "signup/")
    ->setController(\App\Controller\AuthController::class)
    ->setAction('signup');

$routes->add('logout', "logout/")
    ->setController(\App\Controller\AuthController::class)
    ->setAction('logout');

/* Home routes */

$routes->add('home', "/")
    ->setController(\App\Controller\HomeController::class)
    ->setAction('home');

$routes->add('generate', "generate/{name}.{lastname}.{id}/")
    ->setController(\App\Controller\HomeController::class)
    ->setAction('generateCV');

$routes->add('ajax-save-data', "save-data/")
    ->setController(\App\Controller\HomeController::class)
    ->setAction('saveData');

$routes->add('ajax-get-data', "get-data/")
    ->setController(\App\Controller\HomeController::class)
    ->setAction('getData');

$routes->add('ajax-upload-image', "upload-image/")
    ->setController(\App\Controller\HomeController::class)
    ->setAction('uploadImage');

$routes->add('open-image', "image/{imageFile}")
    ->setController(\App\Controller\HomeController::class)
    ->setAction('openImage');

$routes->add('test', "test/{a}.{b:[abc]+}.{c:\d+}")
    ->setController(\App\Controller\HomeController::class)
    ->setAction('test');

// $routes->add('generate', [
//     'controller' => \App\Controller\HomeController::class,
//     'action'     => 'openImage',
//     'pattern'    => 'generate/{id}',
//     'redirect'   => 'home',
//     'methods'    => ['post', 'get'],
//     'defaults'   => [
//         'id' => 10,
//     ],
// ]);

return $routes;