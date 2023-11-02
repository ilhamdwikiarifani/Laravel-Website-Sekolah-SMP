<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TautanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isSuperAdmin;
use App\Http\Middleware\superAdminOrAdmin;
use Faker\Provider\Lorem;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//login-page --------------------------------------------Login Part ++
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');



// ------------------------------------------------------------------------
Route::middleware([auth::class])->group(function () {


    // Admin-Page -- ---------------------------------------Berita Part ++
    Route::resource('beritas', BeritaController::class);
    Route::resource('/admin-page/berita', 'BeritaController');
    Route::get('/admin-page/berita', [BeritaController::class, 'index']);
    Route::get('/admin-page/berita/create', [BeritaController::class, 'create']);
    Route::get('/admin-page/berita/edit/{berita:slug}', [BeritaController::class, 'edit']);
    Route::get('/admin-page/berita/show/{berita:slug}', [BeritaController::class, 'show']);
    Route::get('/admin-page/berita/createSlug', [BeritaController::class, 'checkSlug']);

    // -------

    Route::get('/admin-page/berita/{berita:slug}', [BeritaController::class, 'show']);
    Route::get('/admin-page/kategori/{kategori:slug}', [KategoriController::class, 'berita']);



    // Admin-Page -- ---------------------------------------Kategori Part ++
    Route::resource('kategoris', KategoriController::class);
    Route::resource('/admin-page/kategori', 'KategoriController');
    Route::get('/admin-page/kategori', [KategoriController::class, 'index']);
    Route::get('/admin-page/kategori/create', [KategoriController::class, 'create']);
    Route::get('/admin-page/kategori/edit/{kategori:slug}', [KategoriController::class, 'edit']);
    Route::get('/admin-page/kategori/show/{kategori:slug}', [KategoriController::class, 'show']);
    Route::get('/admin-page/kategori/create-slug', [KategoriController::class, 'slugest']);




    // Admin-Page -- ---------------------------------------Galeri Part ++
    Route::resource('galeris', GaleriController::class);
    Route::resource('/admin-page/galeri', 'GaleriController');
    Route::get('/admin-page/galeri', [GaleriController::class, 'index']);
    Route::get('/admin-page/galeri/create', [GaleriController::class, 'create']);
    Route::get('/admin-page/galeri/edit/{galeri:id}', [GaleriController::class, 'edit']);
    Route::get('/admin-page/galeri/show/{galeri:id}', [GaleriController::class, 'show']);


    // Admin-Page -- ---------------------------------------Document Part ++
    Route::resource('documents', DocumentController::class);
    Route::resource('/admin-page/document', 'DocumentController');
    Route::get('/admin-page/document', [DocumentController::class, 'index']);
    Route::get('/admin-page/document/create', [DocumentController::class, 'create']);
    Route::get('/admin-page/document/edit/{document:id}', [DocumentController::class, 'edit']);
    Route::get('/admin-page/document/show/{document:id}', [DocumentController::class, 'show']);

    // Admin-Page -- ---------------------------------------Link Part ++
    Route::resource('tautans', TautanController::class);
    Route::resource('/admin-page/tautan', 'TautanController');
    Route::get('/admin-page/tautan', [TautanController::class, 'index']);
    Route::get('/admin-page/tautan/create', [TautanController::class, 'create']);
    Route::get('/admin-page/tautan/edit/{tautan:id}', [TautanController::class, 'edit']);
    Route::get('/admin-page/tautan/show/{tautan:id}', [TautanController::class, 'show']);


    Route::middleware([superAdminOrAdmin::class])->group(function () {
        // Admin-Page -- ---------------------------------------Struktur Part ++
        Route::resource('strukturs', StrukturController::class);
        Route::resource('/admin-page/struktur', 'StrukturController');
        Route::get('/admin-page/struktur', [StrukturController::class, 'index']);
        Route::get('/admin-page/struktur/create', [StrukturController::class, 'create']);
        Route::get('/admin-page/struktur/edit/{struktur:id}', [StrukturController::class, 'edit']);
        Route::get('/admin-page/struktur/show/{struktur:id}', [StrukturController::class, 'show']);
        Route::get('/exportstruktur', [StrukturController::class, 'exportstruktur'])->name('exportstruktur');


        // Admin-Page -- ---------------------------------------Siswa Part ++
        Route::resource('siswas', SiswaController::class);
        Route::resource('/admin-page/siswa', 'SiswaController');
        Route::get('/admin-page/siswa', [SiswaController::class, 'index']);
        Route::get('/admin-page/siswa/create', [SiswaController::class, 'create']);
        Route::get('/admin-page/siswa/edit/{siswa:id}', [
            SiswaController::class, 'edit'
        ]);
        Route::get('/admin-page/siswa/show/{siswa:id}', [
            SiswaController::class, 'show'
        ]);
        Route::get('/exportsiswa', [SiswaController::class, 'exportsiswa'])->name('exportsiswa');
    });

    Route::middleware([isSuperAdmin::class])->group(function () {
        // Admin-Page -- ---------------------------------------Auth Part ++
        Route::resource('manage-user', AuthController::class);
        Route::resource('/admin-page/manage-user', 'AuthController');
        Route::get('/admin-page/manage-user', [AuthController::class, 'index']);
        Route::get('/admin-page/manage-user/create', [AuthController::class, 'create']);
        Route::get('/admin-page/manage-user/edit/{user:id}', [AuthController::class, 'edit']);
        Route::get('/admin-page/manage-user/show/{user:id}', [AuthController::class, 'show']);
    });

    // Andin-Page -- ---------------------------------------contact Part ++
    Route::resource('/admin-page/notifikasi', 'ContactController');
    Route::get('/admin-page/notifikasi', [ContactController::class, 'Admin']);
    Route::get('/admin-page/notifikasi/show/{contact:id}', [ContactController::class, 'show']);


    // Admin-Page -- ---------------------------------------Struktur Part ++
    Route::resource('/admin', 'DashboardController');
    Route::get('/admin', [DashboardController::class, 'index']);
});





// ------------------------------------------------------------------------

// Landing-Page -- ---------------------------------------Galeri Part ++
Route::resource('/galleri', 'DashboardController');
Route::get('/galleri', [DashboardController::class, 'Galeri']);


// Landing-Page -- ---------------------------------------Home Part ++
Route::resource('/', 'DashboardController');
Route::get('/', [DashboardController::class, 'Home']);

// Landing-Page -- ---------------------------------------Home Part ++
Route::resource('/home', 'DashboardController');
Route::get('/home', [DashboardController::class, 'Home']);


// Landing-Page -- ---------------------------------------Berita Part ++

Route::get('/berita', [BeritaController::class, 'berita']);
Route::get('/berita/{berita:slug}', [BeritaController::class, 'detil']);
Route::get('/berita/kategori/{kategori:slug}', [KategoriController::class, 'kategori']);

// Landing-Page -- ---------------------------------------document Part ++
Route::resource('/document', 'DocumentController');
Route::get('/document', [DocumentController::class, 'document']);
Route::resource('/tautan', 'DocumentController');
Route::get('/tautan', [DocumentController::class, 'tautan']);

// Landing-Page -- ---------------------------------------document Part ++
Route::resource('/struktursekolah', 'StrukturController');
Route::get('/struktursekolah', [StrukturController::class, 'struktur']);


// Landing-Page -- ---------------------------------------contact Part ++
Route::resource('/contact', 'ContactController');
Route::get('/contact', [ContactController::class, 'index']);



Route::get('/visimisi', function () {
    return view('landing-page.visimisi');
});
