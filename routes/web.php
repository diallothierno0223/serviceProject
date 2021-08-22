<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'pageAcceuille'])->name('welcome');
Route::get('/home/offre', [HomeController::class, 'listOffre'])->name('homme.listOffre');
Route::get('/home/demande', [HomeController::class, 'listDemande'])->name('home.listDemande');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(["middleware" => ['auth', 'offre']], function () {
    //route pour offre 
    Route::resource('offre', OffreController::class);
    Route::get('offre/{offre}/supprime', [OffreController::class, 'supprime'])->name('offre.supprime');
    
    //route pour postuler demande
    Route::get("offres/demande/index", [PostulerDemandeController::class, "index"])->name("offre.damande");
    Route::get("offres/demande/{demande}", [PostulerDemandeController::class, "show"])->name("offre.demandeDetaile");
    Route::post("offres/demande/{demande}", [PostulerDemandeController::class, "postuler"])->name("offre.PostulerDemande");
    Route::post("offres/demande/{demande}/supprime", [PostulerDemandeController::class, "supprimer"])->name("offre.SupprimerPostulerDemande");
    
    //voir profile des user qui postule(postuler demande)
    Route::get("offre/profilPostule/{user}/{offre}", [PostulerOffreController::class, "profilePostuler"])->name("offre.showProfilePostuler");
    
    //accepte offre postule
    Route::get("offre/accept/{user}/{offre}", [PostulerOffreController::class, "acceptPostuleOffre"])->name("offre.acceptPostuleOffre");
    
    //refuser offre postule
    Route::get("offre/refusez/{user}/{offre}", [PostulerOffreController::class, "refuserPostuleOffre"])->name("offre.refuserPostuleOffre");

});

Route::group(["middleware" => ['auth', 'demande']], function () {
    //url demande
    Route::resource('/demandes', DemandeController::class);
    
    //route pour postuler offre
    Route::get("demandes/offre/index", [PostulerOffreController::class, "index"])->name("demande.offre");
    Route::get("demande/offre/{offre}", [PostulerOffreController::class, "show"])->name("demande.offreDetaile");
    Route::post("demandes/offre/{offre}", [PostulerOffreController::class, "postuler"])->name("demandes.PostulerOffre");
    Route::post("demandes/offre/{offre}/supprime", [PostulerOffreController::class, "supprimer"])->name("demandes.SupprimerPostulerOffre");
    
    //voir profile des user qui recrute(postuler offre)
    Route::get("demande/profilPostule/{user}/{demande}", [PostulerDemandeController::class, "profilePostuler"])->name("demande.showProfilePostuler");
    
    //accepte demande postule
    Route::get("demande/accept/{user}/{demande}", [PostulerDemandeController::class, "acceptPostuleDemande"])->name("demande.acceptPostuleDemande");
    
    //refuser demande postule
    Route::get("demande/refusez/{user}/{demande}", [PostulerDemandeController::class, "refuserPostuleDemande"])->name("demande.refuserPostuleDemande");

});

Route::group(["middleware" => ['auth'] ], function () {
    //route pour modifier le profile (info, password, avatar, et affiche profile)
    Route::get('profile/show', [ModifieProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [ModifieProfileController::class,'index'])->name('profile.index');
    Route::post('profile/update', [ModifieProfileController::class,'update'])->name('profile.update');
    Route::post('profile/update/avatar', [ModifieProfileController::class, 'avatar'])->name('profile.update.avatar');
    Route::post('profile/update/possword', [ModifieProfileController::class, 'password'])->name('profile.update.password');

});
