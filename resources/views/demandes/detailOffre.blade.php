@extends("layouts.master")

@section("content")

<div class="container">
    @if (Session::has("success"))
        <div class="alert alert-success">
            {{Session::get("success")}}
        </div>
    @endif
    
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

    <div class="row m-1">
        @if ($affiche)
            <form method="post" action="{{route("demandes.PostulerOffre", [ "offre" => $offre->id])}}">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg">postuler a cette offre</button>
            </form>
        @else
            <div class="col-md-12">
                <p class="text-danger">vous avez deja postuler</p>
            </div>
            <div class="col-md-12">
                <form method="post" action="{{route("demandes.SupprimerPostulerOffre", [ "offre" => $offre->id])}}">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-lg">supprimer la offre d'emploi</button>
                </form>
            </div>
        @endif
    </div>
    
</div>

@endsection