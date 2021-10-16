@extends('layouts.master')
@section('content')

<div class="container">
    
    <div class="row m-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Demande</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('demandes.index') }}"> Back</a>
            </div>
        </div>
    </div>
    
    <div class="row justify-content-between mb-3">
        <div class="col-xs-3 col-sm-12 col-md-3 m-2">
            <div class="card text-center">
                <div class="card-header bg-info text-white">Job</div>
                <div class="card-body">
                    {{ $demande->job->libelle }}
                </div>
            </div>
        </div>

        <div class="col-xs-3 col-sm-12 col-md-3 m-2">
            <div class="card text-center">
                <div class="card-header bg-info text-white">Salaire</div>
                <div class="card-body">{{ $demande->salaire }}</div>
            </div>
        </div>
        
        <div class="col-xs-3 col-sm-12 col-md-3 m-2">
            <div class="card text-center">
                <div class="card-header bg-info text-white">lieu cible:</div>
                <div class="card-body">{{ $demande->lieu_cible }}</div>
            </div>
        </div>

    </div>

    <div class="row justify-content-between mb-3">
        <div class="col-xs-3 col-sm-12 col-md-3 m-2">
            <div class="card text-center">
                <div class="card-header bg-info text-white">Langue</div>
                <div class="card-body">
                    {{ $demande->langue }}
                </div>
            </div>
        </div>

        <div class="col-xs-2 col-sm-12 col-md-3 m-2">
            <div class="card text-center">
                <div class="card-header  bg-info text-white">Type de Salaire</div>
                <div class="card-body">{{ $demande->type_salaire }}</div>
            </div>
        </div>
        
        <div class="col-xs-2 col-sm-12 col-md-2 m-2">
            <div class="card text-center">
                <div class="card-header bg-info text-white">Sexe</div>
                <div class="card-body">
                    {{ $demande->sexe }}
                </div>
            </div>
        </div>
       
        <div class="col-xs-3 col-sm-12 col-md-3 m-2">
            <div class="card text-center">
                <div class="card-header bg-info text-white text-sm">Heure de travail par jours</div>
                <div class="card-body">
                    {{ $demande->heure_de_travail_par_jours }}
                </div>
            </div>
        </div>

        
    </div>
        
        
    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-md-12 m-2">
            <div class="card text-center">
                <div class="card-header bg-info text-white">experience</div>
                <div class="card-body">{{ $demande->experience }}</div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-md-12 m-2">
            <div class="card text-center">
                <div class="card-header bg-info text-white">Motivation</div>
                <div class="card-body">{{ $demande->motivation }}</div>
            </div>
        </div>
    </div>
    
    
    <hr>

    <div class="row">
        <div class="col-md-12">
            <h1>personne qui on postuler a votre demande d'emploi</h1>
        </div>
        <div class="col-md-12">
            <ul>
                @foreach ($demande->user_postuler as $postuler)
                    <li>{{$postuler->name}} a postuler a cette demande <u><a href="{{ route("demande.showProfilePostuler", ["user" => $postuler->pivot->user_id, "demande" => $postuler->pivot->demande_id])}}">cliquée ici pour voir le profile</a></u></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection