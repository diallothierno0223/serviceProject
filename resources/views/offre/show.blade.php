@extends('layouts.master')
@section('content')

<div class="container">
    
    <div class="row m-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> affiche offre</h2>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-info">Détails</div>
                <div class="card-body">
    
                    <div class="row justify-content-between mb-3">
    
                        <div class="col-xs-3 col-sm-12 col-md-3 m-2">
                                <div class="font-weight-bold text-center"><u>Job</u></div>
                                <div class="text-center">{{ $offre->job->libelle }}</div>
                        </div>
                
                        <div class="col-xs-3 col-sm-12 col-md-3 m-2">
                                <div class="font-weight-bold text-center"><u>Salaire</u></div>
                                <div class="text-center">{{ $offre->salaire }}</div>
                        </div>
                        
                        <div class="col-xs-3 col-sm-12 col-md-3 m-2">
                                <div class="font-weight-bold text-center"><u>lieu cible:</u></div>
                                <div class="text-center">{{ $offre->lieu_cible }}</div>
                        </div>
                
                    </div>

                    <div class="row justify-content-between mb-3">

                        <div class="col-xs-3 col-sm-12 col-md-3 m-2">
                                <div class="font-weight-bold text-center"><u>Langue</u></div>
                                <div class="text-center">{{ $offre->langue }}</div>
                        </div>
                
                        <div class="col-xs-2 col-sm-12 col-md-3 m-2">
                                <div class="font-weight-bold text-center"><u>Type de Salaire</u></div>
                                <div class="text-center">{{ $offre->type_salaire }}</div>
                        </div>
                        
                        <div class="col-xs-2 col-sm-12 col-md-2 m-2">
                                <div class="font-weight-bold text-center"><u>Sexe</u></div>
                                <div class="text-center">{{ $offre->sexe }}</div>
                        </div>
                       
                        <div class="col-xs-3 col-sm-12 col-md-3 m-2">
                                <div class="font-weight-bold text-center text-sm"><u>Heure de travail par jours</u></div>
                                <div class="text-center">{{ $offre->heure_de_travail_par_jours }}</div>
                        </div>
                
                        
                    </div>

                    <div class="row mb-3">

                        <div class="col-xs-12 col-sm-12 col-md-12 m-2">
                                <div class="font-weight-bold text-center"><u>description</u></div>
                                <div class="text-center">{{ $offre->description }}</div>
                        </div>

                    </div>
    
                </div>
            </div>
        </div>
    </div>
    
    <hr>

    <div class="row">
        <div class="">
            <a href="{{route('offre.edit', ['offre' => $offre->id])}}" class="btn btn-info btn-lg">Modifier</a>
            <a href="{{route('offre.supprime', ['offre' => $offre->id])}}" class="btn btn-danger btn-lg">Supprimer</a>
        </div>
    </div>
    
    <hr>

    <div class="row">
        <div class="col-md-12">
            <h1>Les personnes qui ont postulé à cette offre d'emploi</h1>
        </div>
        <div class="col-md-12">
            <ul>
                @foreach ($offre->user_postuler as $postuler)
                    <li>{{$postuler->name}} a postuler a cette offre <u><a href="{{ route("offre.showProfilePostuler", ["user" => $postuler->pivot->user_id, "offre" => $postuler->pivot->offre_id])}}">cliquée ici pour voir le profile</a></u></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection