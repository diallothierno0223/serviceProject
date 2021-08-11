@extends('layouts.app')

@section('content')
    <h1>creer une offre</h1>
    <hr>
    <form class="container" action="{{route('offre.store')}}" method="post">
        @csrf
        <div class="form-group">
            <p>job</p>
            <select name="job_id">
                <option>choose....</option>
                @foreach ($jobs as $job)
                    <option value="{{$job->id}}">{{$job->libelle}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <p>lieu cible</p>
            <input type="text" name="lieu_cible" id="">
        </div>
        <div class="form-group">
            <p> langue</p>
            <input type="text" name="langue" id="">
        </div>
        <div class="form-group">
            <p>sexe</p>
            <input type="radio" name="sexe" value="homme" checked>homme
            <input type="radio" name="sexe" values="femme">femme
        </div>
        <div class="form-group">
            <p>description</p>
            <textarea name="description"></textarea>
        </div>
        <div class="form-group">
            <p>salaire</p>
            <input type="text" name="salaire" id="">
        </div>
        <div class="form-group">
            <p>type salaire</p>
            <select name="type_salaire">
                <option value="mois"> mois</option>
                <option value=" jours"> jours</option>
                <option value=" heure"> heure</option>
            </select>
        </div>
        <div class="form-group">
            <p>heure de boulot</p>
            <input type="text" name="heure_de_travail_par_jours" id="">
        </div>
        <div class="form-group">
            <p>status</p>
            <select name="status">
                <option value="disponible"> disponible</option>
                <option value="indisponible"> indisponible</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">poster </button>
    </form>
@endsection