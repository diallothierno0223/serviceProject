@extends('layouts.master')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    Faire une demande
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

      <form method="post" action="{{ route('demandes.store') }}">
        @csrf


        <div class="form-group">
            <label for="job_id" class="col-md-4 col-form-label text-md-right">Type de profile</label>

            <div class="col-md-6">

                <div class="input-group mb-3 " name="job_id">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">type</label>
                    </div>
                    <select class="custom-select" name="job_id" id="job_id">
                      <option >Choose...</option>
                      @foreach ($jobs as $job)
                        <option value="{{$job->id}}">{{$job->libelle}}</option>
                      @endforeach
                      
                    </select>
                </div>

            </div>
        </div>


          <div class="form-group">
              <label for="lieu_cible">lieu ciblé:</label>
              <input type="text" class="form-control" name="lieu_cible" class="form-control @error('lieu_cible') is-invalid @enderror" value="{{ old('lieu_cible') }}" required autocomplete="lieu_cible" />
              @error('lieu_cible')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>


          <div class="form-group">
          <label for="sexe">sexe</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexe" id="flexRadioDefault1" value="homme">
                <label class="form-check-label" for="flexRadioDefault1">
                  homme
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexe" id="flexRadioDefault2" value="femme">
                <label class="form-check-label" for="flexRadioDefault2">
                  femme
                </label>
            </div>

            </div>


          <div class="form-group">
              <label for="salaire">salaire:</label>
              <input type="text" class="form-control" name="salaire" class="form-control @error('salaire') is-invalid @enderror" value="{{ old('salaire') }}" required autocomplete="salaire"/>
              @error('salaire')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>

          <select class=form-control name="type_salaire" >
              <option>Choose...</option>
              <option value="journalier">journalier</option>
              <option value="Mois">Mois</option>
          </select>

          <div class="form-group">
              <label for="heure_de_travail_par_jours">heure de travail par jours:</label>
              <input type="heure_de_travail_par_jours" class="form-control" name="heure_de_travail_par_jours" class="form-control @error('heure_de_travail_par_jours') is-invalid @enderror" value="{{ old('heure_de_travail_par_jours') }}" required autocomplete="heure_de_travail_par_jours"/>
              @error('heure_de_travail_par_jours')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>

          <div class="form-group">
              <label for="langue">Langue:</label>
              <input type="text" class="form-control" name="langue" class="form-control @error('langue') is-invalid @enderror" value="{{ old('langue') }}" required autocomplete="langue"/>
              @error('langue')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>

          
          <div class="form-group">
              <label for="experience">experience:</label>
              <textarea class="form-control" id="experience" rows="3" name="experience"></textarea>
              @error('experience')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
              @enderror
          </div>

          <div class="form-group">
              <label for="motivation">motivation:</label>
              <textarea class="form-control" id="motivation" rows="3" name="motivation"></textarea>
              @error('motivation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>

          <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
  </div>
</div>
@endsection