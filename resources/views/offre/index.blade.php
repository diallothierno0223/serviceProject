@extends("layouts.app")


@section("content")
<a href="{{route('offre.create')}}" class="btn btn-primary">creer un article</a>
<table class="table">
    <tr>
        <td>id</td>
        <td>job</td>
        <td>lieu cible</td>
        <td>langue</td>
        <td>sexe</td>
        <td>description</td>
        <td>salaire</td>
        <td>type salaire</td>
        <td>heure de boulot</td>
        <td>statue</td>
    </tr>
    @foreach ($offres as $offre)
    <tr>
        <td><a href="{{route('offre.show', ['offre' => $offre->id ])}}">{{$offre->id}}</a></td>
        <td>{{$offre->job->libelle}}</td>
        <td>{{$offre->lieu_cible}}</td>
        <td>{{$offre->langue}}</td>
        <td>{{$offre->sexe}}</td>
        <td>{{$offre->description}}</td>
        <td>{{$offre->salaire}}</td>
        <td>{{$offre->type_salaire}} </td>
        <td>{{$offre->heure_de_travail_par_jours}}</td>
        <td>{{$offre->status}}</td>
    </tr>
    @endforeach
</table>

@endsection