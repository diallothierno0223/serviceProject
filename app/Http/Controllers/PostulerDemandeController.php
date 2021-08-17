<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Offre;
use App\Models\Demande;
use Illuminate\Http\Request;
use App\Models\Postuler_demande;

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
        $affiche = $user->demande_postuler->count() > 0 ? false : true;
        return view('offre.detailDemande', ["demande" => $demande, "affiche" => $affiche]);
    }

    //postuler a une offre fonction
    public function postuler(Demande $demande)
    {
        $user = User::findOrFail(auth()->user()->id);
        $demande->user_postuler()->attach($user->id);
        return redirect()->back()->with("success", "demande de recrutement envoyer avec succes");
    }

    //supprime postuler a une offre fonction
    public function supprimer(Demande $demande)
    {
        $user = User::findOrFail(auth()->user()->id);
        $demande->user_postuler()->detach($user->id);
        return redirect()->back()->with("success", "la demande de recrutement a bien ete suprimer avec succes");
    }

    public function profilePostuler(User $user, Offre $offre){
        //on boucle et on verifie si le user a bien postuler et on envoie la view ou on renvoie 404
        $a = false;
        foreach($user->offre_postuler as $item){
            if($item->pivot->offre_id == $offre->id){
                $a = true;
            }
        }
        if($a){
            return view("offre.profilePostuler", ["user" => $user]);
        }else {
            return abort(404);
        } 
        
    }
   

}
