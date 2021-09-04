<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Offre;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth'])->except(['pageAcceuille', 'listOffre', 'listDemande', 'contact']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function pageAcceuille(){
        return view('home.index');
    }

    public function listOffre(){
        $offres = Offre::orderBy('id', 'desc')->paginate(20);
        return view('home.listOffre', ["offres" => $offres]);
    }

    public function listDemande(){
        $demandes = Demande::orderBy('id', 'desc')->paginate(20);
        return view('home.listDemande', ["demandes" => $demandes]);
    }

    public function contact(){
        return view('home.contact');
    }

    public function readNotification($id, User $user){
        foreach($user->notifications as $item){
            if($item->id == $id){
                $item->markAsRead();
            }
        }

        return redirect()->back();
    }

    public function readNotificationPost($id, User $user){
        foreach($user->notifications as $item){
            if($item->id == $id){
                $item->markAsRead();
                if($user->profil->name == 'demande'){
                    return redirect()->route('demande.showProfilePostuler', ["user" => $item->data['user_postule_id'], "demande" => $item->data['demande_id']]);
                }
                if($user->profil->name == 'offre'){
                    return redirect()->route('offre.showProfilePostuler', ["user" => $item->data['user_postule_id'], "offre" => $item->data['offre_id']]);
                }
            }
        }

    }
}
