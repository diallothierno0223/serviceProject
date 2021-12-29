<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Offre;
use App\Models\Demande;
use App\Models\Postuler_demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Vonage\Client;
use Nexmo\Laravel\Facade\Nexmo;
use Vonage\Client\Credentials\Basic;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth'])->except(['pageAcceuille', 'listOffre', 'listDemande', 'contact','searchOffre', 'searchDemande']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $nbr_postuler = 0;
        if (auth()->user()->profil->name == 'offre'){
            foreach (auth()->user()->offres as $offre){
                foreach ($offre->user_postuler as $user_postuler){
                    $nbr_postuler += 1;
                }
            }
        }

        if (auth()->user()->profil->name == 'demande'){
            foreach (auth()->user()->demandes as $demande){
                foreach ($demande->user_postuler as $user_postuler){
                    $nbr_postuler += 1;
                }
            }
        }

        return view('home', ['nbr_postuler' => $nbr_postuler]);
    }

    public function pageAcceuille(){
        // dd("okk");

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

    public function searchOffre(){
        $q = request()->validate([
            'search' => 'min:1'
        ]);
        $offres = Offre::where('description', 'like', '%'.$q['search'].'%')->orderBy('id', 'desc')->paginate(20);
        return view('home.listOffre', ["offres" => $offres])->with('search', $offres->count()." resultat trouver ");
    }

    public function searchDemande(){
        $q = request()->validate([
            'search' => 'min:1'
        ]);
        $demandes = Demande::where('motivation', 'like', '%'.$q['search'].'%')->orWhere('experience', 'like', '%'.$q['search'].'%')->orderBy('id', 'desc')->paginate(20);
        return view('home.listDemande', ["demandes" => $demandes]);
    }
}
