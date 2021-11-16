@extends("layouts.master")


@section("content")
<div class="container">
    <a href="{{route('offre.create')}}" class="btn btn-primary m-3">creer une offre</a><br>
<table class="table table-striped">
    <thead>
        {{-- <th scope="col">id</th> --}}
        <th scope="col">job</th>
        <th scope="col">lieu cible</th>
        <th scope="col">langue</th>
        <th scope="col">sexe</th>
        <th scope="col">description</th>
        <th scope="col">salaire</th>
        <th scope="col">type salaire</th>
        <th scope="col">heure de boulot</th>
        <th scope="col">statue</th>
        <th scope="col">action</th>
    </thead>
    <tbody>
        @foreach ($offres as $offre)
        <tr>
            {{-- <th scope="col">{{$offre->id}}</th> --}}
            <td>{{$offre->job->libelle}}</td>
            <td>{{$offre->lieu_cible}}</td>
            <td>{{$offre->langue}}</td>
            <td>{{$offre->sexe}}</td>
            <td>{{substr($offre->description, 0, 50)."..." }}</td>
            <td>{{$offre->salaire}}</td>
            <td>{{$offre->type_salaire}} </td>
            <td>{{$offre->heure_de_travail_par_jours}}</td>
            <td>{{$offre->status}}</td>
            <td>
                <form action="" class="form-inline mt-2 mt-md-0">
                    <a class="btn btn-primary m-1 btn-sm" href="{{route('offre.show', ['offre' => $offre->id ])}}"><i class="fa fa-eye"></i></i></a>
                    <a href="{{route('offre.edit', ['offre' => $offre->id])}}" class="btn btn-info m-1 btn-sm "><i class="fa fa-edit"></i></a>
                    <a href="{{route('offre.supprime', ['offre' => $offre->id])}}" class="btn btn-danger m-1 btn-sm "><i class="fa fa-trash"></i></a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection