@extends("layouts.master")

@section('content')
    <h1>page detail</h1>
    <h4><a href="{{route('offre.show', ['offre' => $offre->id ])}}">{{$offre->id}}</a></h4>
    <h4>{{$offre->job->libelle}}</h4>
    <h4>{{$offre->lieu_cible}}</h4>
    <h4>{{$offre->langue}}</h4>
    <h4>{{$offre->sexe}}</h4>
    <h4>{{$offre->description}}</h4>
    <h4>{{$offre->salaire}}</h4>
    <h4>{{$offre->type_salaire}} </h4>
    <h4>{{$offre->heure_de_travail_par_jours}}</h4>
    <h4>{{$offre->status}}</h4>
    <hr>
    <a href="{{route('offre.edit', ['offre' => $offre->id])}}" class="btn btn-info btn-lg">Modifier</a>
    <a href="{{route('offre.supprime', ['offre' => $offre->id])}}" class="btn btn-danger btn-lg">Supprimer</a>
    <div class="container">
        <hr>
        <h1>personne qui on postuler a votre offre d'emploi</h1>
        @foreach ($offre->user_postuler as $postuler)
            <p>{{$postuler->name}} a postuler a cette offre <a href="{{ route("offre.showProfilePostuler", ["user" => $postuler->pivot->user_id, "offre" => $postuler->pivot->offre_id])}}">cliquée ici pour voir le profile</a></p>
        @endforeach
    </div>
@endsection