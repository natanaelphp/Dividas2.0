<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$router->get('login', 'AuthController@login');
$router->post('login', 'AuthController@authenticate');
$router->get('logout', "AuthController@logout");

$router->group(['middleware' => 'auth'], function($router) {

    $router->get('/', 'HomeController@index');

    $router->get('transactions', 'TransactionController@index');
    $router->get('transactions/add/{paid_by}', 'TransactionController@create');
    $router->post('transactions', 'TransactionController@store');

    $router->get('changePassword', 'ChangePasswordController@form');
    $router->post('changePassword', 'ChangePasswordController@changePassword');

});
