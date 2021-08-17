@extends("layouts.master")

@section("content")
    <div class="container justify-content-center">
        @if (Session::has("success"))
            <div class="alert alert-success">
                {{Session::get("success")}}
            </div>
        @endif
        <div class="justify-content-center">
            <h1>page detail de l'offre dans demande</h1>
            <p><strong>nnom de l'employeur : </strong> {{$offre->user->name}} {{$offre->user->lastName}}</p>
            <p><strong>job : </strong>{{$offre->job->libelle}}</p>
            <p><strong>lieu cible : </strong>{{$offre->lieu_cible}}</p>
            <p><strong>langue : </strong>{{$offre->langue}}</p>
            <p><strong>sexe : </strong>{{$offre->sexe}}</p>
            <p><strong>description : </strong>{{$offre->description}}</p>
            <p><strong>salaire : </strong>{{$offre->salaire}}</p>
            <p><strong>type_salaire : </strong>{{$offre->type_salaire}}</p>
            <p><strong>heure_de_travail_par_jours : </strong>{{$offre->heure_de_travail_par_jours}}</p>
        </div>
        @if ($affiche)
            <form method="post" action="{{route("demandes.PostulerOffre", [ "offre" => $offre->id])}}">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg">postuler a cette offre</button>
            </form>
        @else
            <p class="text-danger">vous avez deja postuler</p>
            <form method="post" action="{{route("demandes.SupprimerPostulerOffre", [ "offre" => $offre->id])}}">
                @csrf
                <button type="submit" class="btn btn-danger btn-lg">supprimer la demande d'emploi</button>
            </form>
        @endif
    </div>
@endsection