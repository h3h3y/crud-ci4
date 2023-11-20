<?php
use App\Controllers\Iwan;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/', 'Iwan::index');
$routes->get('buku/databuku', 'Iwan::databuku');
$routes->get('buku/inputbuku', 'Iwan::inputbuku');
$routes->post('buku/simpandatabuku', 'Iwan::simpandatabuku');
$routes->get('/buku/detailbuku/(:any)', 'Iwan::detailbuku/$1');
$routes->get('/buku/editbuku/(:any)', 'Iwan::editbuku/$1');
$routes->put('/buku/updatebuku', 'Iwan::updatebuku');
$routes->get('/buku/deletebuku/(:any)', 'Iwan::deletebuku/$1');