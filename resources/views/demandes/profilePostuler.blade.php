@extends("layouts.master")

@section("content")
    <div class="container">
        @if (Session::has("success"))
            <div class="alert alert-success">
                <p>{{Session::get("success")}}</p>
            </div>
        @endif
        <h1>page detail profile dans demande</h1>
        <h1>title demande : {{ $demande->motivation }}</h1>
        <hr>
        <p><strong>name : </strong> {{$user->name}}</p>
        <p><strong>lastName : </strong> {{$user->lastName}}</p>
        <p><strong>dateNaissance : </strong> {{$user->dateNaissance}}</p>
        <p><strong>sexe : </strong> {{$user->sexe}}</p>
        <p><strong>email : </strong> {{$user->email}}</p>
        <p><strong>numero : </strong> {{$user->numero}}</p>
        <p><strong>numeroPieceIdentiter : </strong> {{$user->numeroPieceIdentiter}}</p>
        <p><strong>pays : </strong> {{$user->pays}}</p>
        <p><strong>ville : </strong> {{$user->ville}}</p>
        <p><strong>rue : </strong> {{$user->rue}}</p>
        <p class="row">
            @if ($postule->status == "indefini")
                <a href="{{ route('demande.acceptPostuleDemande',[ "user" => $user->id, "demande" => $demande->id])}}" class="btn btn-info">accepter</a>
                <a href="{{ route('demande.refuserPostuleDemande',[ "user" => $user->id, "demande" => $demande->id]) }}" class="btn btn-warning">refusez</a>
            @else
                <h1 class="{{ $postule->status == "accepter" ? "text-success ": "text-danger"}}">vous avez deja {{$postule->status}} cette demande de recrutement </h1>
            @endif
        </p>
    </div>
@endsection