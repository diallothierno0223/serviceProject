@extends("layouts.master")

@section("content")
    <div class="container">
        <h1>page detail profile dans offre</h1>
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
            <button class="btn btn-info">accepter</button>
            <button class="btn btn-warning">refusez</button>
        </p>
    </div>
@endsection