@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('modifie profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="name" value="{{auth()->user()->name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                <input id="lastName" value="{{auth()->user()->lastName}}" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" >

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
                                <input id="dateNaissance" value="{{auth()->user()->dateNaissance}}" type="date" class="form-control @error('dateNaissance') is-invalid @enderror" name="dateNaissance" value="{{ old('dateNaissance') }}" required autocomplete="dateNaissance" >

                                @error('dateNaissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="numero" class="col-md-4 col-form-label text-md-right">{{ __('numero') }}</label>

                            <div class="col-md-6">
                                <input id="numero" value="{{auth()->user()->numero}}" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}" required autocomplete="numero" >

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
                                <input id="numeroPieceIdentiter" value="{{auth()->user()->numeroPieceIdentiter}}" type="text" class="form-control @error('numeroPieceIdentiter') is-invalid @enderror" name="numeroPieceIdentiter" value="{{ old('numeroPieceIdentiter') }}" required autocomplete="numeroPieceIdentiter" >

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
                                <input id="pays" value="{{auth()->user()->pays}}" type="text" class="form-control @error('pays') is-invalid @enderror" name="pays" value="{{ old('pays') }}" required autocomplete="pays" >

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
                                <input id="ville" value="{{auth()->user()->ville}}" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}" required autocomplete="ville" >

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
                                <input id="rue" value="{{auth()->user()->rue}}" type="text" class="form-control @error('rue') is-invalid @enderror" name="rue" value="{{ old('rue') }}" required autocomplete="rue" >

                                @error('rue')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- end add -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('modifier') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Photo</div>
                <div class="justify-content-center car-body">
                    <img src="{{asset('storage/'.auth()->user()->avatar)}}" alt="" width="200" height="200" class="thumbnail image-rounded">
                    <form method="post" action="{{ route('profile.update.avatar')}}" enctype="multipart/form-data">
                        @csrf
                        <p>selectionee photo de profile </p>
                        <input type="file" name="avatar" accept="image/*" required/>
                        <input type="submit" value="envoyer">
                    </form>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">Mot de passe </div>
                <div class="justify-content-center car-body">
                    <form method="post" action="{{ route('profile.update.password')}}" >
                        @csrf
                        <p>modifie mdp</p>
                        <input type="password" name="password" placeholder="new password" required/>
                        <input type="password" name="password1" placeholder="confirm new password" required/>
                        <input type="submit" value="envoyer">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
