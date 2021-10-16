@extends('layouts.master')

@section('extra-css')



@endsection

@section('content')
<div class="container">
    <div class=" m-3">
        @if (auth()->user()->profil->name == 'offre')
            <div class="row m-2">
                <div class="col-md-12">
                    <div class="card border-info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{asset('storage/'.auth()->user()->avatar)}}" width="75" height="75" class="rounded-circle"  alt="profile">
                                </div>
                                <div class="col-md-4">
                                    <p>nombre d'offre poster : {{ auth()->user()->offres->count() }}</p>
                                </div>
                                <div class="col-md-5">
                                    <p>nombre de personne qui on postuler a vos offre : {{ $nbr_postuler }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row m-2">
                <div class="col-md-6 col-sm-12 mt-1 mb-1">
                    <div class="card border-info">
                        <ul class="list-group list-group-flush">
                            @foreach (auth()->user()->demande_postuler as $postuler)
                                <li class="list-group-item"><a href="{{route("offre.demandeDetaile", ["demande" => $postuler->pivot->demande_id])}}" class="">vous avez postuler a la demande n°{{$postuler->id}} | {{substr($postuler->motivation, 0, 25)."..."}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
    
                <div class="col-md-6 col-sm-12 mt-1 mb-1">
                    <div class="card border-info">
                        <ul class="list-group list-group-flush">
                            @foreach (auth()->user()->offres->reverse() as $offre)
                                @foreach ($offre->user_postuler->reverse() as $user_postuler)
                                    <li class="list-group-item"><a href="{{ route("offre.showProfilePostuler", ["user" => $user_postuler->pivot->user_id, "offre" => $user_postuler->pivot->offre_id])}}">{{ $user_postuler->name }} {{ $user_postuler->lastName }} a postuler a votre offre N°{{ $user_postuler->pivot->offre_id }} | cliquée pour voir</a></li>
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>


        @endif
        @if (auth()->user()->profil->name == 'demande')
            <div class="row m-2">
                <div class="col-md-12">
                    <div class="card border-info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{asset('storage/'.auth()->user()->avatar)}}" width="75" height="75" class="rounded-circle"  alt="profile">
                                </div>
                                <div class="col-md-4">
                                    <p>nombre d'offre poster : {{ auth()->user()->demandes->count() }}</p>
                                </div>
                                <div class="col-md-5">
                                    <p>nombre de personne qui on postuler a vos offre : {{ $nbr_postuler }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row m-2">
                <div class="col-md-6 col-sm-12 mt-1 mb-1">
                    <div class="card border-info">
                        <ul class="list-group list-group-flush">
                            @foreach (auth()->user()->offre_postuler as $postuler)
                                <li class="list-group-item"><a href="{{route("demande.offreDetaile", ["offre" => $postuler->pivot->offre_id])}}" class="">vous avez postuler a l'offre' n°{{$postuler->id}} | {{substr($postuler->description, 0, 25)."..."}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
    
                <div class="col-md-6 col-sm-12 mt-1 mb-1">
                    <div class="card border-info">
                        <ul class="list-group list-group-flush">
                            @foreach (auth()->user()->demandes->reverse() as $demande)
                                @foreach ($demande->user_postuler->reverse() as $user_postuler)
                                    <li class="list-group-item"><a href="{{ route("demande.showProfilePostuler", ["user" => $user_postuler->pivot->user_id, "demande" => $user_postuler->pivot->demande_id])}}">{{ $user_postuler->name }} {{ $user_postuler->lastName }} a postuler a votre demande N°{{ $user_postuler->pivot->demande_id }} | cliquée pour voir</a></li>
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>


        @endif
    </div>
</div>
@endsection


@section('extra-js')
    

@endsection