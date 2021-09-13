@extends("layouts.master")

@section("content")
    <div class="container justify-content-center">
        <div class="row justify-content-end m-3">
            <form action="{{ route('home.searchOffre')}}" method="get" class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="row justify-content-center">
            @if (Session::has('search'))
                <div>
                    <p>{{Session::get('search')}}</p>
                </div>
            @endif
            @foreach ($offres as $offre)
                <div class="card m-3 " style="width: 15rem;">
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