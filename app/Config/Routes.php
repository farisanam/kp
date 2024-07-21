<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Beranda::index');


$routes->group('pelanggan', function($routes) {
    $routes->get('/', 'Pelanggan::index');
    $routes->get('tambah_pelanggan', 'Pelanggan::tambah');
    $routes->post('simpan', 'Pelanggan::simpan');
    $routes->get('edit/(:num)', 'Pelanggan::edit/$1');
    $routes->post('update/(:num)', 'Pelanggan::update/$1');
    $routes->get('delete/(:num)', 'Pelanggan::delete/$1');
});

$routes->group('paket', function($routes) {
    $routes->get('/', 'Paket::index');
    $routes->get('tambah_paket', 'Paket::tambah');
    $routes->post('simpan', 'Paket::simpan');
    $routes->get('edit/(:segment)', 'Paket::edit/$1');
    $routes->post('update/(:segment)', 'Paket::update/$1');
    $routes->get('delete/(:segment)', 'Paket::delete/$1');
});

$routes->group('transaksi', function($routes) {
    $routes->get('/', 'Transaksi::index');
    $routes->get('/transaksi/tambah_transaksi', 'Transaksi::tambah');
    $routes->post('/transaksi/simpan', 'Transaksi::simpan');
    $routes->get('/transaksi/edit/(:segment)', 'Transaksi::edit/$1');
    $routes->post('/transaksi/update/(:segment)', 'Transaksi::update/$1');
});


$routes->get('/laporan', 'Laporan::index');


$routes->get('/tentang', 'Tentang::index');




