@extends('layouts.master')

@section("content")
    <h1>vous allez supprimer le post {{$offre->description}}</h1>
    <form action="{{route('offre.destroy', ['offre' => $offre->id])}}" method="post">
        @csrf
        @method("DELETE")
        <button type="submit" class="btn btn-danger btn-lg">supprimer</button>
    </form>
@endsection