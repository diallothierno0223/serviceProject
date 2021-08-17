<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\PostulerOffreController;
use App\Http\Controllers\ModifieProfileController;
use App\Http\Controllers\PostulerDemandeController;

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
    return view('home.index');
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

//route pour offre 
Route::resource('offre', OffreController::class)->middleware('auth');
Route::get('offre/{offre}/supprime', [OffreController::class, 'supprime'])->middleware('auth')->name('offre.supprime');

//url demande
Route::resource('/demandes', DemandeController::class)->middleware('auth');

//route pour postuler offre
Route::get("demandes/offre/index", [PostulerOffreController::class, "index"])->name("demande.offre")->middleware('auth');
Route::get("demande/offre/{offre}", [PostulerOffreController::class, "show"])->name("demande.offreDetaile")->middleware('auth');
Route::post("demandes/offre/{offre}", [PostulerOffreController::class, "postuler"])->name("demandes.PostulerOffre")->middleware("auth");
Route::post("demandes/offre/{offre}/supprime", [PostulerOffreController::class, "supprimer"])->name("demandes.SupprimerPostulerOffre")->middleware("auth");

//route pour postuler demande
Route::get("offres/demande/index", [PostulerDemandeController::class, "index"])->name("offre.damande")->middleware('auth');
Route::get("offres/demande/{demande}", [PostulerDemandeController::class, "show"])->name("offre.demandeDetaile")->middleware('auth');
Route::post("offres/demande/{demande}", [PostulerDemandeController::class, "postuler"])->name("offre.PostulerDemande")->middleware("auth");
Route::post("offres/demande/{demande}/supprime", [PostulerDemandeController::class, "supprimer"])->name("offre.SupprimerPostulerDemande")->middleware("auth");

//voir profile des user qui recrute(postuler offre)
Route::get("offre/demande/profilPostule/{user}/{demande}", [PostulerOffreController::class, "profilePostuler"])->name("demande.showProfilePostuler")->middleware("auth");

//voir profile des user qui postule(postuler demande)
Route::get("demande/offre/profilPostule/{user}/{offre}", [PostulerDemandeController::class, "profilePostuler"])->name("offre.showProfilePostuler")->middleware("auth");
