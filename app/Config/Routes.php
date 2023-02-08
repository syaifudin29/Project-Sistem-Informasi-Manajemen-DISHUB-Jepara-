<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ['filter' => 'tamuFilter']);
$routes->get('/login', 'Login::index', ['filter' => 'tamuFilter']);
$routes->post('/login/proses', 'Home::prosesLogin', ['filter' => 'tamuFilter']);
$routes->get('/daftar', 'Home::daftar', ['filter' => 'tamuFilter']);
$routes->post('/daftar/simpan/', 'Home::daftarsave', ['filter' => 'tamuFilter']);
$routes->get('/logout', 'Home::logout');
$routes->get('/sendnotif/(:num)', 'Staf\Send::proses/$1');

//peserta
$routes->get('/peserta', 'Peserta\Absensi::index', ['filter' => 'pesertaFilter']);
$routes->get('/peserta/abensi', 'Peserta\Absensi::index', ['filter' => 'pesertaFilter']);
$routes->post('/peserta/absensi/aksi', 'Peserta\Absensi::aksi', ['filter' => 'pesertaFilter']);

$routes->get('/peserta/tugas', 'Peserta\Tugas::index', ['filter' => 'pesertaFilter']);
$routes->post('/peserta/tugas/simpan', 'Peserta\Tugas::simpan', ['filter' => 'pesertaFilter']);

$routes->get('/peserta/logbook', 'Peserta\Logbook::index', ['filter' => 'pesertaFilter']);
$routes->post('/peserta/logbook/tambah/', 'Peserta\Logbook::tambah', ['filter' => 'pesertaFilter']);
$routes->get('/peserta/profil', 'Peserta\Profil::index', ['filter' => 'pesertaFilter']);

$routes->post('/peserta/profil/update', 'Peserta\Profil::update', ['filter' => 'pesertaFilter']);
$routes->post('/peserta/profil/photo', 'Peserta\Profil::photo', ['filter' => 'pesertaFilter']);
$routes->get('/peserta/sertifikasi', 'Peserta\Sertifikasi::index', ['filter' => 'pesertaFilter']);
$routes->get('/peserta/sertifikasi/nilai', 'Peserta\Sertifikasi::nilai', ['filter' => 'pesertaFilter']);
$routes->get('/peserta/sertifikasi/sertifikat', 'Peserta\Sertifikasi::sertifikat', ['filter' => 'pesertaFilter']);

//staf
$routes->get('/staf', 'Staf\Absensi::index', ['filter' => 'stafFilter']);
$routes->get('/staf/absensi', 'Staf\Absensi::index', ['filter' => 'stafFilter']);
$routes->get('/staf/absensi/delete/(:any)', 'Staf\Absensi::delete/$1', ['filter' => 'stafFilter']);
$routes->get('/staf/absensi/tampil/(:any)', 'Staf\Absensi::tampilAbsensi/$1', ['filter' => 'stafFilter']);
$routes->post('/staf/absensi/tambah', 'Staf\Absensi::tambah', ['filter' => 'stafFilter']);
$routes->get('/staf/daftar_peserta', 'Staf\DaftarPeserta::index', ['filter' => 'stafFilter']);
$routes->post('/staf/daftar_peserta/update', 'Staf\DaftarPeserta::updatePeserta', ['filter' => 'stafFilter']);
$routes->get('/staf/calon/(:num)', 'Staf\DaftarPeserta::calon/$1', ['filter' => 'stafFilter']);
$routes->post('/staf/calon/terima/', 'Staf\DaftarPeserta::calonTerima', ['filter' => 'stafFilter']);

$routes->get('/staf/daftar_peserta/delete/(:num)', 'Staf\DaftarPeserta::deletePeserta/$1', ['filter' => 'stafFilter']);

$routes->get('/staf/penugasan', 'Staf\Penugasan::index', ['filter' => 'stafFilter']);
$routes->get('/staf/penugasan/cari/(:any)', 'Staf\Penugasan::tanggal/$1', ['filter' => 'stafFilter']);
$routes->post('/staf/penugasan/tambah', 'Staf\Penugasan::tambah', ['filter' => 'stafFilter']);
$routes->get('/staf/penugasan/hapus/(:num)', 'Staf\Penugasan::hapus/$1', ['filter' => 'stafFilter']);
$routes->post('/staf/penugasan/proses/', 'Staf\Penugasan::prosesTugas/', ['filter' => 'stafFilter']);

$routes->get('/staf/pengawasan', 'Staf\Pengawasan::index', ['filter' => 'stafFilter']);
$routes->get('/staf/pengawasan/(:any)', 'Staf\Pengawasan::tanggal/$1', ['filter' => 'stafFilter']);
$routes->post('/staf/pengawasan/tambah', 'Staf\Pengawasan::tambah', ['filter' => 'stafFilter']);
$routes->post('/staf/pengawasan/update', 'Staf\Pengawasan::update', ['filter' => 'stafFilter']);

$routes->get('/staf/sertifikasi', 'Staf\Sertifikasi::index', ['filter' => 'stafFilter']);
$routes->post('/staf/sertifikasi/aksi', 'Staf\Sertifikasi::aksi', ['filter' => 'stafFilter']);
$routes->get('/staf/sertifikasi/delete/(:num)', 'Staf\Sertifikasi::delete/$1', ['filter' => 'stafFilter']);
$routes->get('/staf/sertifikasi/peserta/(:num)', 'Staf\Sertifikasi::peserta/$1', ['filter' => 'stafFilter']);
$routes->post('/staf/sertifikasi/peserta/nilai', 'Staf\Sertifikasi::nilai', ['filter' => 'stafFilter']);
$routes->post('/staf/sertifikasi/peserta/tambah', 'Staf\Sertifikasi::nilaiTambah', ['filter' => 'stafFilter']);
$routes->get('/staf/sertifikasi/hitung', 'Staf\Sertifikasi::hitung', ['filter' => 'stafFilter']);

$routes->get('/staf/profil', 'Staf\Profil::index', ['filter' => 'stafFilter']);



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
