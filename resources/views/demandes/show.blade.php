@extends('layouts.master')
@section('content')

<div class="container">
    
    <div class="row m-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> affiche Demande</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('demandes.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card m-2">
                <div class="card-header bg-info">Details</div>
                <div class="card-body">

                    <div class="row justify-content-between mb-3">
                        <div class="col-xs-3 col-sm-12 col-md-3 m-2">
                            <div class="font-weight-bold text-center"><u>Job</u></div>
                            <div class="text-center">
                                {{ $demande->job->libelle }}
                            </div>
                        </div>
                
                        <div class="col-xs-3 col-sm-12 col-md-3 m-2">
                            <div class="font-weight-bold text-center"><u>Salaire</u></div>
                            <div class="text-center">{{ $demande->salaire }}</div>
                        </div>
                        
                        <div class="col-xs-3 col-sm-12 col-md-3 m-2">
                            <div class="font-weight-bold text-center"><u>Lieu cible</u></div>
                            <div class="text-center">{{ $demande->lieu_cible }}</div>
                        </div>
                
                    </div>

                    <div class="row justify-content-between mb-3">

                        <div class="col-xs-3 col-sm-12 col-md-3 m-2">
                                <div class="font-weight-bold text-center"><u>Langue</u></div>
                                <div class="text-center">{{ $demande->langue }}</div>
                        </div>
                
                        <div class="col-xs-2 col-sm-12 col-md-3 m-2">
                                <div class="font-weight-bold text-center"><u>Type de Salaire</u></div>
                                <div class="text-center">{{ $demande->type_salaire }}</div>
                        </div>
                        
                        <div class="col-xs-2 col-sm-12 col-md-2 m-2">
                            <div class="font-weight-bold text-center"><u>Sexe</u></div>
                            <div class="text-center">{{ $demande->sexe }}</div>
                        </div>
                       
                        <div class="col-xs-3 col-sm-12 col-md-3 m-2">
                            <div class="font-weight-bold text-center"><u>Heure de travail par jours</u></div>
                            <div class="text-center">{{ $demande->heure_de_travail_par_jours }}</div>
                        </div>
                
                        
                    </div>

                    <div class="row mb-3">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-2">
                            <div class="font-weight-bold text-center"><u>experience</u></div>
                            <div class="text-center">{{ $demande->experience }}</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-2">
                            <div class="font-weight-bold text-center">Motivation</div>
                            <div class="text-center">{{ $demande->motivation }} </div>
                        </div>
                    </div>

                </div>
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