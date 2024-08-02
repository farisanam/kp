<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->get('/auth', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/auth/logout', 'Auth::logout');

$routes->group('pelanggan', function($routes) {
    $routes->get('/', 'Pelanggan::index', ['filter' => 'auth']);
    $routes->get('tambah_pelanggan', 'Pelanggan::tambah', ['filter' => 'auth']);
    $routes->post('simpan', 'Pelanggan::simpan', ['filter' => 'auth']);
    $routes->get('edit/(:num)', 'Pelanggan::edit/$1', ['filter' => 'auth']);
    $routes->post('update/(:num)', 'Pelanggan::update/$1', ['filter' => 'auth']);
    $routes->get('delete/(:num)', 'Pelanggan::delete/$1', ['filter' => 'auth']);
});

$routes->group('paket', function($routes) {
    $routes->get('/', 'Paket::index', ['filter' => 'auth']);
    $routes->get('tambah_paket', 'Paket::tambah', ['filter' => 'auth']);
    $routes->post('simpan', 'Paket::simpan', ['filter' => 'auth']);
    $routes->get('edit/(:segment)', 'Paket::edit/$1', ['filter' => 'auth']);
    $routes->post('update/(:segment)', 'Paket::update/$1', ['filter' => 'auth']);
    $routes->get('delete/(:segment)', 'Paket::delete/$1', ['filter' => 'auth']);
});

$routes->group('transaksi', function($routes) {
    $routes->get('/', 'Transaksi::index', ['filter' => 'auth']);
    $routes->get('tambah_transaksi', 'Transaksi::tambah', ['filter' => 'auth']);
    $routes->post('simpan', 'Transaksi::simpan', ['filter' => 'auth']);
    $routes->get('edit/(:segment)', 'Transaksi::edit/$1', ['filter' => 'auth']);
    $routes->post('update/(:segment)', 'Transaksi::update/$1', ['filter' => 'auth']);
    $routes->get('delete/(:segment)', 'Transaksi::delete/$1', ['filter' => 'auth']);
    $routes->get('konfirmasi_ambil/(:segment)', 'Transaksi::konfirmasi_ambil/$1', ['filter' => 'auth']);
});

$routes->get('laporan', 'Laporan::index', ['filter' => 'auth']);
$routes->post('laporan', 'Laporan::index', ['filter' => 'auth']);
$routes->get('laporan/KICKBATH', 'Laporan::KICKBATH', ['filter' => 'auth']);

$routes->get('/tentang', 'Tentang::index', ['filter' => 'auth']);
