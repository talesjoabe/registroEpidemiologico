<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthController;
use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$callback = function (Router $api) {
    $api->post('login', 'AuthController@login');
    $api->post('register', 'Auth\RegisterController@register');
    $api->group(['middleware' => 'api.auth'], function (Router $api) {
        $api->post('doencas', 'DoencasController@store');
        $api->put('doencas/{doenca}', 'DoencasController@update');
        $api->get('doencas', 'DoencasController@index');
        $api->get('doencas/{doenca}', 'DoencasController@show');
        $api->delete('doencas/{doenca}', 'DoencasController@destroy');

        $api->post('estados', 'EstadosController@store');
        $api->put('estados/{estado}', 'EstadosController@update');
        $api->get('estados', 'EstadosController@index');
        $api->get('estados/{estado}', 'EstadosController@show');
        $api->delete('estados/{estado}', 'EstadosController@destroy');

        $api->post('municipios', 'MunicipiosController@store');
        $api->put('municipios/{municipio}', 'MunicipiosController@update');
        $api->get('municipios', 'MunicipiosController@index');
        $api->get('municipios/{municipio}', 'MunicipiosController@show');
        $api->delete('municipios/{municipio}', 'MunicipiosController@destroy');

        $api->post('users', 'UsersController@store');
        $api->put('users/{user}', 'UsersController@update');
        $api->get('users', 'UsersController@index');
        $api->get('users/{user}', 'UsersController@show');
        $api->delete('users/{user}', 'UsersController@destroy');

        $api->get('users/{user}/date_group', 'UsersController@getGrupo');

        $api->post('usuario_doencas', 'UsuarioDoencasController@store');
        $api->put('usuario_doencas/{usuario_doenca}', 'UsuarioDoencasController@update');
        $api->get('usuario_doencas', 'UsuarioDoencasController@index');
        $api->get('usuario_doencas/{usuario_doenca}', 'UsuarioDoencasController@show');
        $api->delete('usuario_doencas/{usuario_doenca}', 'UsuarioDoencasController@destroy');
    });
};

$api->version('v1', ['namespace' => 'App\Http\Controllers', 'middleware' => 'api'], $callback);


