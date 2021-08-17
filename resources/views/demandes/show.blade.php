@extends('layouts.master')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Demande</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('demandes.index') }}"> Back</a>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Job:</strong>
                {{ $demande->job->libelle }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>lieu cible:</strong>
                {{ $demande->lieu_cible }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Langue:</strong>
                {{ $demande->langue }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sexe:</strong>
                {{ $demande->sexe }}
            </div>
        </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Salaire:</strong>
                {{ $demande->salaire }}
            </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Type de Salaire:</strong>
                {{ $demande->type_salaire }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Heure de travail par jours:</strong>
                {{ $demande->heure_de_travail_par_jours }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Demande:</strong>
                {{ $demande->experience }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Motivation:</strong>
                {{ $demande->motivation }}
            </div>
        </div>
    </div>
    <div class="container">
        <hr>
        <h1>personne qui on postuler a votre demande d'emploi</h1>
        @foreach ($demande->user_postuler as $postuler)
            <p>{{$postuler->name}} a postuler a cette offre <a href="{{ route("demande.showProfilePostuler", ["user" => $postuler->pivot->user_id, "demande" => $postuler->pivot->demande_id])}}">cliquée ici pour voir le profile</a></p>
        @endforeach
    </div>
@endsection