@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row m-3 justify-content-center">
            <div class="col-md-10">
                <h1>modifie une offre</h1>
                <hr>
                <form class="" action="{{route('offre.update', ['offre' => $offre->id])}}" method="post">
                    @csrf
                    @method("PATCH")
                    <div class="form-group">
                        <label for="job_id">job</label>
                        <select class="form-control @error("job_id") is-invalid @enderror" name="job_id" id="job_id">
                            <option>choose....</option>
                            @foreach ($jobs as $job)
                                <option value="{{$job->id}}" {{$job->id == $offre->job_id ? "selected" : ""}}>{{$job->libelle}}</option>
                            @endforeach
                        </select>
                        @error("job_id")
                            <div class="invalid-feedback">
                                <p>{{$message}}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lieu_cible">lieu cible</label>
                        <input type="text" name="lieu_cible" id="lieu_cible" value="{{$offre->lieu_cible}}" class="form-control @error("lieu_cible") is-invalid @enderror">
                        @error("lieu_cible")
                            <div class="invalid-feedback">
                                <p>{{$message}}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="langue"> langue</label>
                        <input type="text" name="langue" id="langue" value="{{$offre->langue}}" class="form-control @error("langue") is-invalid @enderror">
                        @error("langue")
                            <div class="invalid-feedback">
                                <p>{{$message}}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>sexe</label><br>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="homme" class="form-check-input" name="sexe" value="homme" {{$offre->sexe == 'homme' ? "checked" : ""}}>
                            <label for="homme" class="form-check-label">homme</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="femme" class="form-check-input" name="sexe" value="femme" {{$offre->sexe == 'femme' ? "checked" : ""}} >
                            <label for="femme" class="form-check-label">femme</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea rows="5" class="form-control @error("description") is-invalid @enderror" id="description" name="description">{{$offre->description}}</textarea>
                        @error("description")
                            <div class="invalid-feedback">
                                <p>{{$message}}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="salaire">salaire</label>
                        <input type="text" class="form-control  @error("salaire") is-invalid @enderror" value="{{$offre->salaire}}" name="salaire" id="salaire">
                        @error("salaire")
                            <div class="invalid-feedback">
                                <p>{{$message}}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="type_salaire">type salaire</label>
                        <select id="type_salaire" class="form-control @error("type_salaire") is-invalid @enderror" name="type_salaire">
                            <option value="mois" {{$offre->type_salaire == 'mois' ? "selected" : ""}}> mois</option>
                            <option value="jours" {{$offre->type_salaire == 'jours' ? "selected" : ""}}> jours</option>
                            <option value="heure" {{$offre->type_salaire == 'heure' ? "selected" : ""}}> heure</option>
                        </select>
                        @error("type_salaire")
                            <div class="invalid-feedback">
                                <p>{{$message}}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="heure_de_travail_par_jours">heure de boulot</label>
                        <input type="text" value="{{$offre->heure_de_travail_par_jours}}" class="form-control @error("heure_de_travail_par_jours") is-invalid @enderror" name="heure_de_travail_par_jours" id="heure_de_travail_par_jours">
                        @error("heure_de_travail_par_jours")
                            <div class="invalid-feedback">
                                <p>{{$message}}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">status</label>
                        <select id="status" class="form-control @error("status") is-invalid @enderror" name="status">
                            <option value="disponible" {{$offre->status == 'disponible' ? "selected" : ""}}> disponible</option>
                            <option value="indisponible" {{$offre->status == 'indisponible' ? "selected" : ""}}> indisponible</option>
                        </select>
                        @error("status")
                            <div class="invalid-feedback">
                                <p>{{$message}}</p>
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Modifier </button>
                </form><br>
            </div>
        </div>
    </div>
@endsection