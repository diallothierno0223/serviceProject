@extends('layouts.master')

@section('content')

<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-10 m-3">
      <div class="card shadow-lg rounded text-white">
        <div class="card-header bg-primary">
          Faire une demande
        </div>
      
        <div class="card-body bg-info">
      
            <form method="post" action="{{ route('demandes.update',$demande->id) }}">
              @csrf
              @method('PATCH')
              <div class="form-group row">
                  <label for="job_id" class="col-md-4 col-form-label text-md-right">job</label>
      
                  <div class="col-md-6">
      
                      <div class="input-group mb-3 " name="job_id">
                          <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">type</label>
                          </div>
                          <select class="custom-select" name="job_id" id="job_id">
                            <option >Choose...</option>
                            @foreach ($jobs as $job)
                              <option value="{{$job->id}}" {{ $demande->job_id == $job->id ? "selected" : "" }}>{{$job->libelle}}</option>
                            @endforeach
                            
                          </select>
                      </div>
      
                  </div>
              </div>
      
      
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right" for="lieu_cible">lieu ciblé:</label>
                    <input type="text" class=" col-md-6 form-control" name="lieu_cible" class="form-control @error('lieu_cible') is-invalid @enderror" value="{{ $demande->lieu_cible }}" required autocomplete="lieu_cible" />
                    @error('lieu_cible')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
      
      
                <div class="form-group row">
                  <label for="sexe" class="col-md-4 col-form-label text-md-right">{{ __('sexe') }}</label>
      
                  <div class="col-md-6">
                      <div class="form-check form-check-inline col-md-5">
                          <input class="form-check-input" type="radio" name="sexe" id="homme" value="homme" {{ $demande->sexe == "homme" ? "checked" :""}}>
                          <label class="form-check-label" for="homme">Homme</label>
                      </div>
                      <div class="form-check form-check-inline col-md-5">
                          <input class="form-check-input" type="radio" name="sexe" id="femme" value="femme" {{ $demande->sexe == "femme" ? "checked" :""}}>
                          <label class="form-check-label" for="femme">Femme</label>
                      </div>
      
                      @error('sexe')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
      
                </div>
      
                
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right" for="salaire">salaire:</label>
                    <input type="text" class="col-md-6 form-control" name="salaire" class="form-control @error('salaire') is-invalid @enderror" value="{{ $demande->salaire }}" required autocomplete="salaire"/>
                    @error('salaire')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
      
                <div class="form-group row">
                  <label for="type_salaire" class="col-md-4 col-form-label text-md-right">Type de salaire</label>
      
                  <div class="col-md-6">
      
                      <div class="input-group mb-3 " name="type_salaire">
                          <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">type</label>
                          </div>
                          <select class="custom-select" data-toggle="tooltip" data-placement="top" title="selectionnee votre type de salaire" name="type_salaire" id="type_salaire">
                            <option selected>Choose...</option>
                            <option value="heure" {{ $demande->type_salaire == "heure" ? "selected" : "" }}>par heure</option>
                            <option value="jours" {{ $demande->type_salaire == "jours" ? "selected" : "" }}>journalier</option>
                            <option value="mois" {{ $demande->type_salaire == "mois" ? "selected" : "" }}>mensuelle</option>
                          </select>
                      </div>
      
                      @error('type_salaire')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>
      
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right" for="heure_de_travail_par_jours">heure de travail par jours:</label>
                    <input type="text" name="heure_de_travail_par_jours" class="col-md-6 form-control @error('heure_de_travail_par_jours') is-invalid @enderror" value="{{ $demande->heure_de_travail_par_jours }}" required autocomplete="heure_de_travail_par_jours"/>
                    @error('heure_de_travail_par_jours')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
      
                <div class="form-group row ">
                    <label class="col-md-4 col-form-label text-md-right" for="langue">Langue:</label>
                    <input type="text" name="langue" class="col-md-6 form-control @error('langue') is-invalid @enderror" value="{{ $demande->langue }}" required autocomplete="langue"/>
                    @error('langue')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
      
                
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right" for="experience">experience:</label>
                    <textarea class="col-md-6 form-control @error('experience') is-invalid @enderror" id="experience" rows="5" name="experience">{{ $demande->experience }}</textarea>
                    @error('experience')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                    @enderror
                </div>
      
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right" for="motivation">motivation:</label>
                    <textarea class="col-md-6 form-control @error('motivation') is-invalid @enderror" id="motivation" rows="5" name="motivation">{{ $demande->motivation }}</textarea>
                    @error('motivation')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>
                <div class="row form-group">
                  <div class="col-md-4"></div>
                  <div class="col-md-6 ">
                    <div class="row justify-content-between">
                      <button type="submit" class="btn btn-primary">Ajouter</button>
                      <button class="btn btn-warning" type="reset">effacer tout le formulaire</button>
                    </div>
                  </div>
                </div>
            </form>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
