<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Offre;
use App\Models\Demande;
use Illuminate\Http\Request;
use App\Models\Postuler_offre;
use App\Notifications\UserPostuleOffreNotification;
use App\Notifications\UserPostuleOffreResponseNotification;

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
        $affiche = true; 
        foreach($user->offre_postuler as $item){
            if($item->pivot->offre_id == $offre->id){
                $affiche = false;

            }
        }
        return view('demandes.detailOffre', ["offre" => $offre, "affiche" => $affiche]);
    }

    //postuler a une offre fonction
    public function postuler(Offre $offre)
    {
        $user = User::findOrFail(auth()->user()->id);
        $offre->user_postuler()->attach($user->id);
        $user_notify = User::findOrFail($offre->user->id);
        $user_notify->notify(new UserPostuleOffreNotification($user, $offre));
        return redirect()->back()->with("success", "postuler avec succes");
    }

    //supprime postuler a une offre fonction
    public function supprimer(Offre $offre)
    {
        $user = User::findOrFail(auth()->user()->id);
        $offre->user_postuler()->detach($user->id);
        
        return redirect()->back()->with("success", "la demande a bien ete suprimer avec succes");
    }

    public function profilePostuler(User $user, Offre $offre){
        //on boucle et on verifie si le user a bien postuler et on envoie la view ou on renvoie 404
        //ses pour afficher le profile de l'offreur d'emploi qui a postuler a la demande d'emploi
        $a = false;
        foreach($user->offre_postuler as $item){
            if($item->pivot->offre_id == $offre->id){
                $a = true;
            }
        }
        $postule = Postuler_offre::where("user_id", $user->id)->where("offre_id", $offre->id)->firstOrFail();
        if($a){
            return view("offre.profilePostuler", ["user" => $user, "offre" => $offre, "postule" => $postule]);
        }else {
            return abort(404);
        } 
        
    }

    
    public function acceptPostuleOffre(User $user, Offre $offre ){
        //pour accepter postuler offre
        foreach($user->offre_postuler as $item){
            if($item->pivot->offre_id == $offre->id){
                $postule = Postuler_offre::where("user_id", $user->id)->where("offre_id", $offre->id)->firstOrFail();
                $postule->update([
                    "status" => "accepter"
                ]);
                $user_notify = User::findOrFail($offre->user->id);
                $user->notify(new UserPostuleOffreResponseNotification($user_notify, $offre, "accepter"));
                return back()->with("success", "vous avez accepter cette demande de d'emploi");
            }
        }
    }

    public function refuserPostuleOffre(User $user, Offre $offre ){
        //pour refusez postuler offre
        foreach($user->offre_postuler as $item){
            if($item->pivot->offre_id == $offre->id){
                $postule = Postuler_offre::where("user_id", $user->id)->where("offre_id", $offre->id)->firstOrFail();
                $postule->update([
                    "status" => "refuser"
                ]);
                $user_notify = User::findOrFail($offre->user->id);
                $user->notify(new UserPostuleOffreResponseNotification($user_notify, $offre, "refuser"));
                return back()->with("success", "vous avez refusez cette demande de d'emploi");
            }
        }
    }

}
