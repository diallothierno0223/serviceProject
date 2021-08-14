<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
             $demandes = Demande::all();
            return view('demandes.index', compact('demandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::all();
        return view('demandes.create', compact('jobs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      
        $validatedData = $request->validate([
            'job_id' => 'required',
            'lieu_cible' => 'required|max:50',
            'langue' => 'required|max:30',
            'sexe' => 'required',
            'experience' => 'required',
            'motivation' => 'required|max:500',
            'salaire' => 'required',
            'type_salaire' => 'required',
            'heure_de_travail_par_jours' => 'required',
            
            
        ]);

        $user = User::findOrFail(auth()->user()->id);
        $demande = $user->demandes()->create($validatedData);
    
        return redirect('/demandes')->with('success', 'Demande créer avec succèss');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show(Demande $demande)
    {
        
        return view('demandes.show',["demande"=> $demande]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande)
    {
        $jobs = Job::all();
        return view('demandes.edit', ["demande"=> $demande], compact('jobs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demande $demande)
    {
        //
        $validatedData = $request->validate([
            'job_id' => 'required',
            'lieu_cible' => 'required|max:50',
            'langue' => 'required|max:30',
            'sexe' => 'required',
            'experience' => 'required',
            'motivation' => 'required|max:500',
            'salaire' => 'required',
            'type_salaire' => 'required',
            'heure_de_travail_par_jours' => 'required',
            'status',
            
            
        ]);
    
       
            $demande->update($validatedData);

            return redirect('/demandes')->with('success', 'demande mise à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {
        $demande->delete();

        return redirect('/demandes')->with('success', 'demande supprimer avec succèss');
    }
}
