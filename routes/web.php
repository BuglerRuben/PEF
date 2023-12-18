<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnnonceController;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/registre', [RegistreController::class, 'create'])->name('registre.create');
Route::post('/registre', [RegistreController::class, 'store'])->name('registre.store');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('edit-profile');
Route::put('/update-profile', [ProfileController::class, 'update'])->name('update-profile');

Route::get('/annonces', [AnnonceController::class, 'index'])->name('annonces.index');
Route::get('/annonces/{id}', [AnnonceController::class, 'show'])->name('annonces.show');
Route::middleware('auth')->group(function () {
Route::get('/create', [AnnonceController::class, 'create'])->name('create');
Route::get('/annonces/{id}', [AnnonceController::class, 'show'])->name('annonces.show');
});
Route::post('/annonces/store', [AnnonceController::class, 'store'])->name('annonces.store');
Route::get('/mes-annonces', [AnnonceController::class, 'mesAnnonces'])->name('annonces.mes');
Route::get('/annonces/{id}/edit', [AnnonceController::class, 'edit'])->name('annonces.edit');
Route::put('/annonces/{id}', [AnnonceController::class, 'update'])->name('annonces.update');

Route::delete('/annonces/{id}', [AnnonceController::class, 'destroy'])->name('annonces.destroy');
Route::post('/annonces/search', [AnnonceController::class, 'search'])->name('annonces.search');

Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('admin', 'AdminController@admin')->name('admin');
    
    Route::get('/','AdminController@index')->name('admin.index');
    Route::middleware('ajax')->group(function () {
        Route::post('approve/{ad}','AdminController@ads')->name('admin.ads');
        Route::post('refuse','AdminController@refuse')->name('admin.refuse');
    }
);
});
Route::get('/index', function () {
    return view('admin.index');
})->name('index');
Route::get('/admin/ads', [AdminController::class, 'ads'])->name('admin.ads');



Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/admin', 'AdminController@index')->name('admin.index');


Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});
Route::get('admin',[AdminController::class,'ajouter_user']);
Route::post('admin/traitement',[AdminController::class,'ajouter_user_traitement']);


Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});
Route::post('/admin/ajouter_user_traitement', 'AdminController@ajouter_user_traitement')->name('admin.ajouter_user_traitement');
Route::get('/admin/ajouterUser', [AdminController::class, 'ajouter_user'])->name('admin.ajouterUser');

Route::get('/admin/show', [AdminController::class, 'show'])->name('admin.show');


Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');