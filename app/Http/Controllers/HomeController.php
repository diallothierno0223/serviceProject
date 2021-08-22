<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\Demande;
use Illuminate\Http\Request;

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
        $offres = Offre::all();
        return view('home.listOffre', ["offres" => $offres]);
    }

    public function listDemande(){
        $demandes = Demande::all();
        return view('home.listDemande', ["demandes" => $demandes]);
    }

    public function contact(){
        return view('home.contact');
    }
}
