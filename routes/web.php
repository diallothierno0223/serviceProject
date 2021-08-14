<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModifieProfileController;
<<<<<<< HEAD
use App\Http\Controllers\OffreController;
=======
use App\Http\Controllers\DemandeController;
>>>>>>> 613af7eeae01eba1f11c42117aa1b51a6da1b7f7

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
<<<<<<< HEAD
    return view('home.index');
=======
 return view('home.index');
   
>>>>>>> 613af7eeae01eba1f11c42117aa1b51a6da1b7f7
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//route pour modifier le profile (info, password, avatar, et affiche profile)
Route::get('profile/show', [ModifieProfileController::class, 'show'])->middleware('auth')->name('profile.show');
Route::get('profile/edit', [ModifieProfileController::class,'index'])->middleware('auth')->name('profile.index');
Route::post('profile/update', [ModifieProfileController::class,'update'])->middleware('auth')->name('profile.update');
Route::post('profile/update/avatar', [ModifieProfileController::class, 'avatar'])->middleware('auth')->name('profile.update.avatar');
Route::post('profile/update/possword', [ModifieProfileController::class, 'password'])->middleware('auth')->name('profile.update.password');

<<<<<<< HEAD
//route pour offre 
Route::resource('offre', OffreController::class)->middleware('auth');
Route::get('offre/{offre}/supprime', [OffreController::class, 'supprime'])->middleware('auth')->name('offre.supprime');
=======

//url demande

Route::resource('/demandes', DemandeController::class)->middleware('auth');
>>>>>>> 613af7eeae01eba1f11c42117aa1b51a6da1b7f7
