@extends('layouts.master')
@section('content')

<div class="container">
    
    <div class="row m-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show offre</h2>
            </div>
        </div>
    </div>
    
    <div class="row justify-content-between mb-3">
        <div class="col-xs-3 col-sm-12 col-md-3 m-2">
            <div class="card text-center">
                <div class="card-header bg-info text-white">Job</div>
                <div class="card-body">
                    {{ $offre->job->libelle }}
                </div>
            </div>
        </div>

        <div class="col-xs-3 col-sm-12 col-md-3 m-2">
            <div class="card text-center">
                <div class="card-header bg-info text-white">Salaire</div>
                <div class="card-body">{{ $offre->salaire }}</div>
            </div>
        </div>
        
        <div class="col-xs-3 col-sm-12 col-md-3 m-2">
            <div class="card text-center">
                <div class="card-header bg-info text-white">lieu cible:</div>
                <div class="card-body">{{ $offre->lieu_cible }}</div>
            </div>
        </div>

    </div>

    <div class="row justify-content-between mb-3">
        <div class="col-xs-3 col-sm-12 col-md-3 m-2">
            <div class="card text-center">
                <div class="card-header bg-info text-white">Langue</div>
                <div class="card-body">
                    {{ $offre->langue }}
                </div>
            </div>
        </div>

        <div class="col-xs-2 col-sm-12 col-md-3 m-2">
            <div class="card text-center">
                <div class="card-header  bg-info text-white">Type de Salaire</div>
                <div class="card-body">{{ $offre->type_salaire }}</div>
            </div>
        </div>
        
        <div class="col-xs-2 col-sm-12 col-md-2 m-2">
            <div class="card text-center">
                <div class="card-header bg-info text-white">Sexe</div>
                <div class="card-body">
                    {{ $offre->sexe }}
                </div>
            </div>
        </div>
       
        <div class="col-xs-3 col-sm-12 col-md-3 m-2">
            <div class="card text-center">
                <div class="card-header bg-info text-white text-sm">Heure de travail par jours</div>
                <div class="card-body">
                    {{ $offre->heure_de_travail_par_jours }}
                </div>
            </div>
        </div>

        
    </div>
        
        
    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-md-12 m-2">
            <div class="card text-center">
                <div class="card-header bg-info text-white">description</div>
                <div class="card-body">{{ $offre->description }}</div>
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
            <h1>personne qui on postuler a votre demande d'emploi</h1>
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