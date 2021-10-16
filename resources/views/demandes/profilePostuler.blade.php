@extends("layouts.master")

@section("content")
    <div class="container">
        @if (Session::has("success"))
            <div class="alert alert-success">
                <p>{{Session::get("success")}}</p>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-6 col-sm-12 m-3">
                <div class="card shadow-xl">
                    <div class="card-header bg-info">
                        Profile
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <img src="{{asset('storage/'.$user->avatar)}}" width="200" height="200" class="img img-circle thumbnail profile-img" alt="profile-image" />
                        </div><hr>
                        <div class="row m-1">
                            <div class="col-md-6 col-sm-12">
                                <p><strong>name : </strong> {{$user->name}}</p>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <p><strong>lastName : </strong> {{$user->lastName}}</p>
                            </div>
                        </div>
                        <div class="row m-1">
                            <div class="col-md-7 col-sm-12">
                                <p><strong>dateNaissance : </strong> {{$user->dateNaissance}}</p>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <p><strong>sexe : </strong> {{$user->sexe}}</p>
                            </div>
                        </div>
                        <div class="row m-1">
                            <div class="col-md-12">
                                <p><strong>email : </strong> {{$user->email}}</p>
                            </div>
                        </div>
                        <div class="row m-1">
                            <div class="col-md-12">
                                <p><strong>numero : </strong> {{$user->numero}}</p>
                            </div>
                        </div>
                        <div class="row m-1">
                            <div class="col-md-12">
                                <p><strong>numeroPieceIdentiter : </strong> {{$user->numeroPieceIdentiter}}</p>
                            </div>
                        </div>
                        <div class="row m-1">
                            <div class="col-md-4 col-sm-12">
                                <p><strong>pays : </strong> {{$user->pays}}</p>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <p><strong>ville : </strong> {{$user->ville}}</p>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <p><strong>rue : </strong> {{$user->rue}}</p>
                            </div>
                        </div><hr>
                        <div class="row justify-content-between">
                            @if ($postule->status == "indefini")
                                <a href="{{ route('demande.acceptPostuleDemande',[ "user" => $user->id, "demande" => $demande->id])}}" class="btn btn-info mr-5 ml-5">accepter</a>
                                <a href="{{ route('demande.refuserPostuleDemande',[ "user" => $user->id, "demande" => $demande->id]) }}" class="btn btn-warning mr-5 ml-5">refusez</a>
                            @else
                                <h3 class="mr-3 ml-3 {{ $postule->status == "accepter" ? "text-success ": "text-danger"}}">vous avez deja {{$postule->status}} cette demande de recrutement </h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection