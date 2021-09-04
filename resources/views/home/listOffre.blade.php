@extends("layouts.master")

@section("content")
    <div class="container justify-content-center">
        <div class="row justify-content-center">
            @foreach ($offres as $offre)
                <div class="card m-3" style="width: 15rem;">
                    <img class="card-img-top" src="{{asset('storage/'.$offre->user->avatar)}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$offre->job->libelle}}</h5>
                        <p class="card-text">{{substr($offre->description, 0, 100)."..."}}</p>
                        <a href="{{route("demande.offreDetaile", ["offre" => $offre->id])}}" class="btn btn-primary">voir les detail</a>
                    </div>
                </div>
            @endforeach
        </div><br>
        <div class="row mb-3 justify-content-center">
            <p class="mb-3">{{$offres->links()}}</p>
        </div>
    </div>
@endsection