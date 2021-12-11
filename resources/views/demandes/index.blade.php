@extends('layouts.master')
@section('content')
<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row m-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Demande </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('demandes.create') }}"> Créer une nouvelle demande</a>
            </div>
        </div>
    </div>
    <div class="row">

        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Job</th>
                    <th scope="col">Lieu_cible</th>
                    <th scope="col">Langue</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Salaire</th>
                    <th scope="col">Type salaire</th>
                    <th scope="col">Heure</th>
                    <th scope="col">Experience</th>
                    <th scope="col">Motivation</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($demandes as $demande)
                <tr>
                    <th scope="col">{{ $demande->id }}</th>
                    <td>{{ $demande->job->libelle }}</td>
                    <td>{{ $demande->lieu_cible }}</td>
                    <td>{{ $demande->langue }}</td>
                    <td>{{ $demande->sexe }}</td>
                    <td>{{ $demande->salaire }}</td>
                    <td>{{ $demande->type_salaire }}</td>
                    <td>{{ $demande->heure_de_travail_par_jours }}</td>
                    <td>{{ substr($demande->experience, 0, 60)."..." }}</td>
                    <td>{{ substr($demande->motivation, 0, 60)."..." }}</td>
                    <td>
                        <form action="{{ route('demandes.destroy',$demande->id) }}" class="form-inline mt-2 mt-md-0" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info btn-sm m-1" href="{{ route('demandes.show',$demande->id) }}"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-primary btn-sm m-1" href="{{ route('demandes.edit',$demande->id) }}"><i class="fa fa-edit"></i></a>
                            <button type="submit" class="btn btn-danger btn-sm m-1"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection