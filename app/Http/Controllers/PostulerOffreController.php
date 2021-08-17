<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Offre;
use App\Models\Demande;
use Illuminate\Http\Request;
use App\Models\Postuler_offre;

class PostulerOffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offres = Offre::where("status", "disponible")->orderBy("id", "desc")->paginate(12);
        return view('demandes.listOffre', ["offres" => $offres]);
    }

    public function show(Offre $offre)
    {
        //recupere le user et verifie si il a deja postuler pour afficher le boutton postuler ou supprime postuler dans la vue datail
        $user = User::findOrFail(auth()->user()->id);
        $affiche = $user->offre_postuler->count() > 0 ? false : true;
        return view('demandes.detailOffre', ["offre" => $offre, "affiche" => $affiche]);
    }

    //postuler a une offre fonction
    public function postuler(Offre $offre)
    {
        $user = User::findOrFail(auth()->user()->id);
        $offre->user_postuler()->attach($user->id);
        
        return redirect()->back()->with("success", "postuler avec succes");
    }

    //supprime postuler a une offre fonction
    public function supprimer(Offre $offre)
    {
        $user = User::findOrFail(auth()->user()->id);
        $offre->user_postuler()->detach($user->id);
        
        return redirect()->back()->with("success", "la demande a bien ete suprimer avec succes");
    }

    public function profilePostuler(User $user, Demande $demande){
        //on boucle et on verifie si le user a bien postuler et on envoie la view ou on renvoie 404
        $a = false;
        foreach($user->demande_postuler as $item){
            if($item->pivot->demande_id == $demande->id){
                $a = true;
            }
        }
        if($a){
            return view("demandes.profilePostuler", ["user" => $user]);
        }else {
            return abort(404);
        } 
        
    }

}
