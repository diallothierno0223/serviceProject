@extends("layouts.master")

@section("content")
    <div class="container justify-content-center">
        <div class="row justify-content-center">
            @foreach ($demandes as $demande)
                <div class="card m-3" style="width: 15rem;">
                    <img class="card-img-top" src="{{asset("style/images/img-02.jpg")}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$demande->job->libelle}}</h5>
                        <p class="card-text">{{substr($demande->motivation, 0, 100)."..."}}</p>
                        <a href="{{route("offre.demandeDetaile", ["demande" => $demande->id])}}" class="btn btn-primary">voir les detail</a>
                    </div>
                </div>
            @endforeach
        </div><br>
        <div class="row justify-content-center">
            {{-- {{$demandes->links()}} --}}
        </div>
    </div>
@endsection