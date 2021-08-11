@extends('layouts.app')

@section('content')
    <h1>modify une offre</h1>
    <hr>
    <form class="container" action="{{route('offre.update', ['offre' => $offre->id])}}" method="post">
        @csrf
        @method("PATCH")
        <div class="form-group">
            <p>job</p>
            <select name="job_id">
                <option>choose....</option>
                @foreach ($jobs as $job)
                    <option value="{{$job->id}}" {{$job->id == $offre->job_id ? "selected" : ""}}>{{$job->libelle}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <p>lieu cible</p>
            <input type="text" value="{{$offre->lieu_cible}}" name="lieu_cible" id="">
        </div>
        <div class="form-group">
            <p> langue</p>
            <input type="text" value="{{$offre->langue}}" name="langue" id="">
        </div>
        <div class="form-group">
            <p>sexe</p>
            <input type="radio" name="sexe" value="homme" {{$offre->sexe == 'homme' ? "checked" : ""}}>homme
            <input type="radio" name="sexe" values="femme" {{$offre->sexe == 'femme' ? "checked" : ""}}>femme
        </div>
        <div class="form-group">
            <p>description</p>
            <textarea name="description">{{$offre->description}}</textarea>
        </div>
        <div class="form-group">
            <p>salaire</p>
            <input type="text" value="{{$offre->salaire}}" name="salaire" id="">
        </div>
        <div class="form-group">
            <p>type salaire</p>
            <select name="type_salaire">
                <option value="mois" {{$offre->type_salaire == 'mois' ? "selected" : ""}}> mois</option>
                <option value="jours" {{$offre->type_salaire == 'jours' ? "selected" : ""}}> jours</option>
                <option value="heure" {{$offre->type_salaire == 'heure' ? "selected" : ""}}> heure</option>
            </select>
        </div>
        <div class="form-group">
            <p>heure de boulot</p>
            <input type="text" value="{{$offre->heure_de_travail_par_jours}}" name="heure_de_travail_par_jours" id="">
        </div>
        <div class="form-group">
            <p>status</p>
            <select name="status">
                <option value="disponible" {{$offre->status == 'disponible' ? "selected" : ""}}> disponible</option>
                <option value="indisponible" {{$offre->status == 'indisponible' ? "selected" : ""}}> indisponible</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">poster </button>
    </form>
@endsection