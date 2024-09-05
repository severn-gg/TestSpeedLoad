<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\BaseController;
use App\Controllers\BO\Kontrol as KontrolBO;
use App\Controllers\Admin\Kontrol as KontrolAdmin;
use App\Controllers\Validator\Kontrol as KontrolValidator;
use App\Controllers\PIC\Kontrol as KontrolPIC;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->post('/login', 'Home::login');
$routes->get('/logout', 'Home::logout');

$routes->group('api', ['namespace' => 'App\Controllers\Api'], static function ($routes) {
    $routes->post('login', 'Api::login');
    $routes->post('insert', 'Api::insert');
    $routes->post('upload', 'Api::upload_files');
    $routes->post('get', 'Api::get');
    $routes->delete('delete', 'Api::delete');
});

// ROUTE ADMIN
$routes->group('admin', static function ($routes) {
    $routes->get('dashboard', [KontrolAdmin::class, 'index']);

    // menu tables
    $routes->get('viewaktivis', [KontrolAdmin::class, 'viewaktivis']);
    $routes->get('viewkantor', [KontrolAdmin::class, 'listkantor']);
    $routes->get('viewarea', [KontrolAdmin::class, 'viewarea']);
    $routes->get('viewpicarea', [KontrolAdmin::class, 'viewpicarea']);
    $routes->get('viewjabatan', [KontrolAdmin::class, 'viewjabatan']);
    $routes->get('viewticket', [KontrolAdmin::class, 'viewticket']);
    $routes->get('ticketdetail', [KontrolAdmin::class, 'detailTiket']);
    $routes->get('ticketdetailprint', [KontrolAdmin::class, 'detailprint']);
    $routes->get('detailkantor', [KontrolAdmin::class, 'detailkantor']);
    $routes->get('listdepartemen', [KontrolAdmin::class, 'listdepartemen']);
    $routes->get('detaildepartemen', [KontrolAdmin::class, 'detaildepartemen']);
    $routes->get('listpic', [KontrolAdmin::class, 'listpic']);
    $routes->get('listdivisi_it', [KontrolAdmin::class, 'listdivisi_it']);

    // menu forms
    $routes->get('forminputaktivis', [KontrolAdmin::class, 'forminputaktivis']);
    $routes->get('forminputjabatan', [KontrolAdmin::class, 'forminputjabatan']);
    $routes->get('forminputarea', [KontrolAdmin::class, 'forminputarea']);
    $routes->get('forminputkantor', [KontrolAdmin::class, 'forminputkantor']);
    $routes->get('formsetkantoraktivis', [KontrolAdmin::class, 'formsetkantoraktivis']);
    $routes->get('formsetjabatanaktivis', [KontrolAdmin::class, 'formsetjabatanaktivis']);
    $routes->get('formsetuserlogintivis', [KontrolAdmin::class, 'formsetuserloginaktivis']);
    $routes->get('formsetpicarea', [KontrolAdmin::class, 'formsetpicarea']);




    // menu charts
    $routes->get('laporantiket', [KontrolAdmin::class, 'chartsTiket']);
    $routes->get('laporantiket/ByStatus', [KontrolAdmin::class, 'exportTiketByStatus']);
    $routes->get('laporantiket/ByKategori', [KontrolAdmin::class, 'exportByKategori']);
    $routes->get('laporantiket/ByKantor', [KontrolAdmin::class, 'exportByKantor']);
    $routes->get('laporantiket/ByVerifikator', [KontrolAdmin::class, 'exportByVerifikator']);

    $routes->get('laporanbo', [KontrolAdmin::class, 'chartsBO']);
    $routes->get('laporanbo/ByStatus', [KontrolAdmin::class, 'exportBOByStatusTiket']);
    $routes->get('laporanbo/ByKategori', [KontrolAdmin::class, 'exportBOByKategori']);
    $routes->get('laporanbo/ByVerifikator', [KontrolAdmin::class, 'exportBOByVerifikator']);

    $routes->get('laporanpic', [KontrolAdmin::class, 'chartsPIC']);
    $routes->get('laporanpic/BySolvingTiket', [KontrolAdmin::class, 'exportPIC_BySolvingTiket']);
    $routes->get('laporanpic/ByKategoriTiket', [KontrolAdmin::class, 'exportPIC_ByKategoriTiket']);
    $routes->get('laporanpic/ByKantorTiket', [KontrolAdmin::class, 'exportPIC_ByKantorTiket']);

    // menu pages    
    $routes->get('profile', [KontrolAdmin::class, 'profile']);
});

// ROUTE BO
$routes->group('bo', static function ($routes) {
    $routes->get('dashboard', [KontrolBO::class, 'index']);
    $routes->get('tiketbaru', [KontrolBO::class, 'tiketbaru']);
    $routes->get('tiketedit', [KontrolBO::class, 'tiketedit']);
    $routes->get('tiketsaya', [KontrolBO::class, 'tiketsaya']);
    $routes->get('tiketbo', [KontrolBO::class, 'tiketbo']);
    $routes->get('tiketdetail', [KontrolBO::class, 'tiketdetail']);
    $routes->get('profile', [KontrolBO::class, 'profile']);
    $routes->get('tiketprint', [KontrolBO::class, 'tiketprint']);
    $routes->get('tiketkonfirmasidetail', [KontrolBO::class, 'tiketkonfirmasidetail']);
    $routes->get('tiketkonfirmasiprint', [KontrolBO::class, 'tiketkonfirmasiprint']);
});

// ROUTE validator
$routes->group('validator', static function ($routes) {
    $routes->get('dashboard', [KontrolValidator::class, 'index']);
    $routes->get('tiketmasuk', [KontrolValidator::class, 'tiketmasuk']);
    $routes->get('tiketverifikasi', [KontrolValidator::class, 'tiketverifikasi']);
    $routes->get('tiketverifikasiprint', [KontrolValidator::class, 'tiketverifikasiprint']);
    $routes->get('tiketdone', [KontrolValidator::class, 'tiketdone']);
    $routes->get('tiketdetail', [KontrolValidator::class, 'tiketdetail']);
    $routes->get('tiketprint', [KontrolValidator::class, 'tiketprint']);
    $routes->get('profile', [KontrolValidator::class, 'profile']);
});

// ROUTE PIC
$routes->group('pic', static function ($routes) {
    $routes->get('dashboard', [KontrolPIC::class, 'index']);
    $routes->get('tiketmasuk', [KontrolPIC::class, 'tiketmasuk']);
    $routes->get('tiketstartworking', [KontrolPIC::class, 'tiketstartworking']);
    $routes->get('tiketstartworkingprint', [KontrolPIC::class, 'tiketstartworkingprint']);
    $routes->get('tiketonprogress', [KontrolPIC::class, 'tiketonprogress']);
    $routes->get('tiketonprogressdetail', [KontrolPIC::class, 'tiketonprogressdetail']);
    $routes->get('tiketonprogressprint', [KontrolPIC::class, 'tiketonprogressprint']);
    $routes->get('tiketdone', [KontrolPIC::class, 'tiketdone']);
    $routes->get('tiketdonedetail', [KontrolPIC::class, 'tiketdonedetail']);
    $routes->get('tiketdoneprint', [KontrolPIC::class, 'tiketdoneprint']);
    $routes->get('profile', [KontrolPIC::class, 'profile']);
});
