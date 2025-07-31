<?php

$router->get('/', 'DashboardController@index');

// Auth
$router->get('/login', 'LoginController@index');
$router->post('/login/auth', 'LoginController@auth');
$router->get('/login/logout', 'LoginController@logout');

// Barang
$router->get('/barang', 'BarangController@index');
$router->get('/barang/create', 'BarangController@create');
$router->post('/barang/store', 'BarangController@store');
$router->get('/barang/edit/{id}', 'BarangController@edit');
$router->post('/barang/update/{id}', 'BarangController@update');
$router->get('/barang/delete/{id}', 'BarangController@delete');
