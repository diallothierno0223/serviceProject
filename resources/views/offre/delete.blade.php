@extends('layouts.master')

@section("content")
    <div class="container">
        <div class="row m-3 justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <h1>vous allez supprimer le post N°{{$offre->id}}</h1>
                        </div>
                        <h1><u>description</u></h1>
                        <p class="text-justify">{{$offre->description }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('offre.destroy', ['offre' => $offre->id])}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-lg">supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection