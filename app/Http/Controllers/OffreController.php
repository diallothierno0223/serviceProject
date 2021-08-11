<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Offre;
use App\Rules\JobRule;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offres = auth()->user()->offres;
        return view('offre.index', ["offres" => $offres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::all();
        return view('offre.create', ["jobs" => $jobs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "job_id" => ["required", new JobRule()],
            "langue" => ["required"],
            "lieu_cible" => ["required"],
            "sexe" => "required",
            "description" => ["required"],
            "salaire" => ["required"],
            "type_salaire" => ["required"],
            "heure_de_travail_par_jours" => ["required"],
            "status" => ["required"]
        ]);

        $offre = new Offre();
        $offre->user_id = auth()->user()->id;
        $offre->job_id = $data["job_id"];
        $offre->langue = $data["langue"];
        $offre->lieu_cible = $data["lieu_cible"];
        $offre->sexe = $data["sexe"];
        $offre->description = $data["description"];
        $offre->salaire = $data["salaire"];
        $offre->type_salaire = $data["type_salaire"];
        $offre->heure_de_travail_par_jours = $data["heure_de_travail_par_jours"];
        $offre->status = $data["status"];

        $offre->save();

        return redirect()->route("offre.index")->with("success", "Offre creer avec succes");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function show(Offre $offre)
    {
        return view('offre.show', ["offre" => $offre]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function edit(Offre $offre)
    {
        return view('offre.update', ["offre" => $offre, "jobs" => Job::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offre $offre)
    {
        $data = $request->validate([
            "job_id" => ["required", new JobRule()],
            "langue" => ["required"],
            "lieu_cible" => ["required"],
            "sexe" => "required",
            "description" => ["required"],
            "salaire" => ["required"],
            "type_salaire" => ["required"],
            "heure_de_travail_par_jours" => ["required"],
            "status" => ["required"]
        ]);

        $offre->update($data);

        return redirect()->route("offre.index")->with("success", "Offre modifier avec succes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offre $offre)
    {
        $offre->delete();
        return redirect()->route("offre.index")->with("success", "Offre supprimer avec succes");
    }

    public function supprime(Offre $offre){
        return view("offre.delete", ["offre" => $offre]);
    }
}
