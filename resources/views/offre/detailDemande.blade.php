@extends("layouts.master")

@section("content")
    <div class="container justify-content-center">
        @if (Session::has("success"))
            <div class="alert alert-success">
                {{Session::get("success")}}
            </div>
        @endif
        <div class="justify-content-center">
            <h1>page detail de demande dans offre</h1>
            <p><strong>nom de l'employeur : </strong> {{$demande->user->name}} {{$demande->user->lastName}}</p>
            <p><strong>job : </strong>{{$demande->job->libelle}}</p>
            <p><strong>lieu cible : </strong>{{$demande->lieu_cible}}</p>
            <p><strong>langue : </strong>{{$demande->langue}}</p>
            <p><strong>sexe : </strong>{{$demande->sexe}}</p>
            <p><strong>experience : </strong>{{$demande->experience}}</p>
            <p><strong>motivation : </strong>{{$demande->motivation}}</p>
            <p><strong>salaire : </strong>{{$demande->salaire}}</p>
            <p><strong>type_salaire : </strong>{{$demande->type_salaire}}</p>
            <p><strong>heure_de_travail_par_jours : </strong>{{$demande->heure_de_travail_par_jours}}</p>
        </div>
        @if ($affiche)
            <form method="post" action="{{route("offre.PostulerDemande", [ "demande" => $demande->id])}}">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg">postuler a cette demande</button>
            </form>
        @else
            <p class="text-danger">vous avez deja postuler</p>
            <form method="post" action="{{route("offre.SupprimerPostulerDemande", [ "demande" => $demande->id])}}">
                @csrf
                <button type="submit" class="btn btn-danger btn-lg">supprimer l'offre d'emploi</button>
            </form>
        @endif
    </div>
@endsection