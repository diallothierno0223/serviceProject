@extends('layouts.app')

@section('content')
    <p>nom :  {{auth()->user()->name}}</p>
    <p>preom : {{auth()->user()->lastName}}</p>
    <p>
        mail : {{auth()->user()->email}}
    </p>
    <p>{{auth()->user()->password}}</p>
@endsection