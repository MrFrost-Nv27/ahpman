<?php

use App\Controllers\Api\KriteriaController;
use App\Controllers\Api\SiswaController;
use App\Controllers\Frontend\Manage;
use App\Controllers\Home;
use App\Controllers\Migrate;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->addPlaceholder('uuid', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');

service('auth')->routes($routes);

$routes->environment('development', static function ($routes) {
    $routes->get('migrate', [Migrate::class, 'index']);
    $routes->get('migrate/(:any)', [Migrate::class, 'execute']);
});

$routes->group('panel', static function (RouteCollection $routes) {
    $routes->get('', [Manage::class, 'index']);
    $routes->get('siswa', [Manage::class, 'siswa']);
    $routes->get('kriteria', [Manage::class, 'kriteria']);
    $routes->get('nilai', [Manage::class, 'nilai']);
    $routes->get('perhitungan', [Manage::class, 'perhitungan']);
    $routes->get('profil', [Manage::class, 'profil']);
    $routes->get('ujian', [Manage::class, 'ujian']);
    $routes->get('pengumuman', [Manage::class, 'pengumuman']);
});

$routes->group('api', ['namespace' => 'App\Controllers\Api'], static function ($routes) {
    $routes->post('register', [Home::class, 'register']);
    $routes->group('v2', ['namespace' => 'App\Controllers\Api'], static function ($routes) {
    });
    $routes->post('kriteria/bobot', [KriteriaController::class, 'updateBobot']);
    $routes->resource('kriteria', ['namespace' => '', 'controller' => KriteriaController::class, 'websafe' => 1]);
    $routes->post('siswa/nilai', [SiswaController::class, 'updateNilai']);
    $routes->post('siswa/hasil', [SiswaController::class, 'updateHasil']);
    $routes->get('siswa/login', [SiswaController::class, 'login']);
    $routes->resource('siswa', ['namespace' => '', 'controller' => SiswaController::class, 'websafe' => 1]);
});
