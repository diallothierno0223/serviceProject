@extends('layouts.master')

@section('content')
<div class="container m-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-2 shadow-lg rounded text-white">
                <div class="card-header bg-primary">{{ __('Inscription') }}</div>

                <div class="card-body bg-info">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="name" placeholder="nom" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- add -->

                        <div class="form-group row">
                            <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Prenom') }}</label>

                            <div class="col-md-6">
                                <input id="lastName" placeholder="prenom" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" >

                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dateNaissance" class="col-md-4 col-form-label text-md-right">{{ __('Date de naissance') }}</label>

                            <div class="col-md-6">
                                <input id="dateNaissance" type="date" class="form-control @error('dateNaissance') is-invalid @enderror" name="dateNaissance" value="{{ old('dateNaissance') }}" required autocomplete="dateNaissance" >

                                @error('dateNaissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sexe" class="col-md-4 col-form-label text-md-right">{{ __('sexe') }}</label>

                            <div class="col-md-6">
                                <div class="form-check form-check-inline col-md-5">
                                    <input class="form-check-input" type="radio" name="sexe" id="homme" value="homme">
                                    <label class="form-check-label" for="homme">Homme</label>
                                </div>
                                <div class="form-check form-check-inline col-md-5">
                                    <input class="form-check-input" type="radio" name="sexe" id="femme" value="femme">
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
                            <label for="numero" class="col-md-4 col-form-label text-md-right">{{ __('numero') }}</label>

                            <div class="col-md-6">
                                <input id="numero" placeholder="numero de telephone avec indicatif" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}" required autocomplete="numero" >

                                @error('numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="numeroPieceIdentiter" class="col-md-4 col-form-label text-md-right">{{ __('Numero de piece d\'identiter') }}</label>

                            <div class="col-md-6">
                                <input id="numeroPieceIdentiter" placeholder="numero de piece d'identité" type="text" class="form-control @error('numeroPieceIdentiter') is-invalid @enderror" name="numeroPieceIdentiter" value="{{ old('numeroPieceIdentiter') }}" required autocomplete="numeroPieceIdentiter" >

                                @error('numeroPieceIdentiter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pays" class="col-md-4 col-form-label text-md-right">{{ __('pays') }}</label>

                            <div class="col-md-6">
                                <input id="pays" type="text" placeholder="votre pays de residence" class="form-control @error('pays') is-invalid @enderror" name="pays" value="{{ old('pays') }}" required autocomplete="pays" >

                                @error('pays')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ville" class="col-md-4 col-form-label text-md-right">{{ __('ville') }}</label>

                            <div class="col-md-6">
                                <input id="ville" type="text" placeholder="votre ville de residence" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}" required autocomplete="ville" >

                                @error('ville')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rue" class="col-md-4 col-form-label text-md-right">{{ __('rue') }}</label>

                            <div class="col-md-6">
                                <input id="rue" type="text" placeholder="rue" class="form-control @error('rue') is-invalid @enderror" name="rue" value="{{ old('rue') }}" required autocomplete="rue" >

                                @error('rue')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profile_id" class="col-md-4 col-form-label text-md-right">Type de profile</label>

                            <div class="col-md-6">

                                <div class="input-group mb-3 " name="profile_id">
                                    <div class="input-group-prepend">
                                      <label class="input-group-text" for="inputGroupSelect01">type</label>
                                    </div>
                                    <select class="custom-select" data-toggle="tooltip" data-placement="top" title="selectionnee votre type de profile" name="profil_id" id="profile_id">
                                      <option selected>Choose...</option>
                                      @foreach ($profiles as $profil)
                                        <option value="{{$profil->id}}">{{$profil->display_name}}</option>
                                      @endforeach
                                      
                                    </select>
                                </div>

                                @error('profile_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- end add -->

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse e-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="votre adresse email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="mot de passe" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmez le mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="confirme mot de passe" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0 ">
                            <div class="col-md-6 offset-md-4 row justify-content-between">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('S\'inscrire') }}
                                </button>
                                <button type="reset" class="btn btn-warning">
                                    {{ __('Effacer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
