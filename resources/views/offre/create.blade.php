@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>creer une offre</h1>
        <hr>
        <form class="" action="{{route('offre.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="job_id">job</label>
                <select class="form-control @error("job_id") is-invalid @enderror" name="job_id" id="job_id">
                    <option>choose....</option>
                    @foreach ($jobs as $job)
                        <option value="{{$job->id}}">{{$job->libelle}}</option>
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
                <input type="text" name="lieu_cible" id="lieu_cible" value="{{old("lieu_cible")}}" class="form-control @error("lieu_cible") is-invalid @enderror">
                @error("lieu_cible")
                    <div class="invalid-feedback">
                        <p>{{$message}}</p>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="langue"> langue</label>
                <input type="text" name="langue" id="langue" value="{{old("langue")}}" class="form-control @error("langue") is-invalid @enderror">
                @error("langue")
                    <div class="invalid-feedback">
                        <p>{{$message}}</p>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>sexe</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" id="homme" class="form-check-input" name="sexe" value="homme" checked>
                    <label for="homme" class="form-check-label">homme</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="femme" class="form-check-input" name="sexe" value="femme" >
                    <label for="femme" class="form-check-label">femme</label>
                </div>
            </div>
            <div class="form-group">
                <label for="description">description</label>
                <textarea class="form-control @error("description") is-invalid @enderror" id="description" name="description">{{old("description")}}</textarea>
                @error("description")
                    <div class="invalid-feedback">
                        <p>{{$message}}</p>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="salaire">salaire</label>
                <input type="text" class="form-control  @error("salaire") is-invalid @enderror" value="{{old("salaire")}}" name="salaire" id="salaire">
                @error("salaire")
                    <div class="invalid-feedback">
                        <p>{{$message}}</p>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="type_salaire">type salaire</label>
                <select id="type_salaire" class="form-control @error("type_salaire") is-invalid @enderror" name="type_salaire">
                    <option value="mois"> mois</option>
                    <option value=" jours"> jours</option>
                    <option value=" heure"> heure</option>
                </select>
                @error("type_salaire")
                    <div class="invalid-feedback">
                        <p>{{$message}}</p>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="heure_de_travail_par_jours">heure de boulot</label>
                <input type="text" value="{{old("heure_de_travail_par_jours")}}" class="form-control @error("heure_de_travail_par_jours") is-invalid @enderror" name="heure_de_travail_par_jours" id="heure_de_travail_par_jours">
                @error("heure_de_travail_par_jours")
                    <div class="invalid-feedback">
                        <p>{{$message}}</p>
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-lg">poster </button>
        </form><br>
    </div>
@endsection