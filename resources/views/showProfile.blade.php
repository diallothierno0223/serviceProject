@extends('layouts.master')

@section('content')
    <p>nom :  {{auth()->user()->name}}</p>
    <p>preom : {{auth()->user()->lastName}}</p>
    <p>
        mail : {{auth()->user()->email}}
    </p>
    <p>{{auth()->user()->profil->name}}</p>
@endsection