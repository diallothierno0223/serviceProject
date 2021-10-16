@extends("layouts.master")

@section("content")

<div class="container">
    @if (Session::has("success"))
        <div class="alert alert-success">
            {{Session::get("success")}}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-10 m-2">
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