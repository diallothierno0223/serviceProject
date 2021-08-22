<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Offre;
use App\Models\Demande;
use Illuminate\Http\Request;
use App\Models\Postuler_demande;
use App\Notifications\UserPostuleDemandeNotification;
use App\Notifications\UserPostuleDemandeResponseNotification;

class PostulerDemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandes = Demande::where("status", "disponible")->orderBy("id", "desc")->paginate(12);
        return view('offre.listDemande', ["demandes" => $demandes]);
    }

    
    public function show(Demande $demande)
    {
        //recupere le user et verifie si il a deja postuler pour afficher le boutton postuler ou supprime postuler dans la vue datail
        $user = User::findOrFail(auth()->user()->id);
        $affiche = true; //$user->demande_postuler->count() > 0 ? false : true;
        foreach($user->demande_postuler as $item){
            if($item->pivot->demande_id == $demande->id){
                $affiche = false;

            }
        }
        return view('offre.detailDemande', ["demande" => $demande, "affiche" => $affiche]);
    }

    //postuler a une offre fonction
    public function postuler(Demande $demande)
    {
        $user = User::findOrFail(auth()->user()->id);
        $demande->user_postuler()->attach($user->id);
        $user_notify = User::findOrFail($demande->user->id);
        $user_notify->notify(new UserPostuleDemandeNotification($user, $demande));
        return redirect()->back()->with("success", "demande de recrutement envoyer avec succes");
    }

    //supprime postuler a une offre fonction
    public function supprimer(Demande $demande)
    {
        $user = User::findOrFail(auth()->user()->id);
        $demande->user_postuler()->detach($user->id);
        return redirect()->back()->with("success", "la demande de recrutement a bien ete suprimer avec succes");
    }

    public function profilePostuler(User $user, Demande $demande){
        //on boucle et on verifie si le user a bien postuler et on envoie la view ou on renvoie 404
        $a = false;
        foreach($user->demande_postuler as $item){
            if($item->pivot->demande_id == $demande->id){
                $a = true;

            }
        }
        $postule = Postuler_demande::where("user_id", $user->id)->where("demande_id", $demande->id)->firstOrFail();
        if($a){
            return view("demandes.profilePostuler", ["user" => $user, "demande" => $demande, "postule" => $postule]);
        }else {
            return abort(404);
        } 
        
    }

    public function acceptPostuleDemande(User $user, Demande $demande ){
        //pour accepter postuler demande
        foreach($user->demande_postuler as $item){
            if($item->pivot->demande_id == $demande->id){
                $postule = Postuler_demande::where("user_id", $user->id)->where("demande_id", $demande->id)->firstOrFail();
                $postule->update([
                    "status" => "accepter"
                ]);
                $user_notify = User::findOrFail($demande->user->id);
                $user->notify(new UserPostuleDemandeResponseNotification($user_notify, $demande, "accepter"));
                return back()->with("success", "vous avez accepter cette demande de recrutement");
            }
        }
    }

    public function refuserPostuleDemande(User $user, Demande $demande ){
        //pour refusez postuler demande
        foreach($user->demande_postuler as $item){
            if($item->pivot->demande_id == $demande->id){
                $postule = Postuler_demande::where("user_id", $user->id)->where("demande_id", $demande->id)->firstOrFail();
                $postule->update([
                    "status" => "refuser"
                ]);
                $user_notify = User::findOrFail($demande->user->id);
                $user->notify(new UserPostuleDemandeResponseNotification($user_notify, $demande, "refuser"));
                return back()->with("success", "vous avez refusez cette demande de recrutement");
            }
        }
    }
   

}
