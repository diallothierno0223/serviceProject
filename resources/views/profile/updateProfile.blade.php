@extends('layouts.master')

@section('content')
    <style>
        body{
            background: #f7f7ff;
            /* margin-top:20px; */
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: .25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }
        .me-2 {
            margin-right: .5rem!important;
        }
    </style>
    <div class="container ">
        <div class="main-body m-3">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{asset('storage/'.auth()->user()->avatar)}}" alt="profile" class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3">
                                    <h3 class="row justify-content-center text-uppercase">selectionee une photo de profile </h3>
                                    <form method="post" action="{{ route('profile.update.avatar')}}" enctype="multipart/form-data">
                                        @csrf
                                        <input class="form-control-file" type="file" name="avatar" accept="image/*" required/>
                                        <button type="submit" class="m-2 btn btn-primary">modifier</button>
                                    </form>
                                </div>
                            </div>
                            <hr class="my-4">
                            <form method="post" action="{{ route('profile.update.password')}}" >
                                @csrf
                                <h3 class="row justify-content-center text-uppercase">modifier le mot de passe</h3>
                                <div class="form-group row">
                                    <input class="form-control" type="password" name="password" placeholder="new password" required/>
                                </div>
                                <div class="form-group row">
                                    <input class="form-control" type="password" name="password1" placeholder="confirm new password" required/>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <button class="btn btn-primary" type="submit">modifier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('profile.update') }}">
                                @csrf
        
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label ">{{ __('Nom') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="name" value="{{auth()->user()->name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="lastName" class="col-md-4 col-form-label ">{{ __('Prenom') }}</label>
        
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
                                    <label for="dateNaissance" class="col-md-4 col-form-label ">{{ __('Date de naissance') }}</label>
        
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
                                    <label for="numero" class="col-md-4 col-form-label ">{{ __('numero') }}</label>
        
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
                                    <label for="numeroPieceIdentiter" class="col-md-4 col-form-label ">{{ __('Numero de piece d\'identiter') }}</label>
        
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
                                    <label for="pays" class="col-md-4 col-form-label ">{{ __('pays') }}</label>
        
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
                                    <label for="ville" class="col-md-4 col-form-label ">{{ __('ville') }}</label>
        
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
                                    <label for="rue" class="col-md-4 col-form-label ">{{ __('rue') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="rue" value="{{auth()->user()->rue}}" type="text" class="form-control @error('rue') is-invalid @enderror" name="rue" value="{{ old('rue') }}" required autocomplete="rue" >
        
                                        @error('rue')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
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
            </div>
        </div>
    </div>
@endsection