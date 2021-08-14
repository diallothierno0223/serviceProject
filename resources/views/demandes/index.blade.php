@extends('layouts.master')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Demande </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('demandes.create') }}"> Create New demande</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Job</th>
            <th>Lieu_cible</th>
            <th>Langue</th>
            <th>Sexe</th>
            <th>Salaire</th>
            <th>Type salaire</th>
            <th>Heure de travail par jours</th>
            <th>Experience</th>
            <th>Motivation</th>
            <th>Actions</th>
        </tr>
        @foreach ($demandes as $demande)
        <tr>
            <td>{{ $demande->job->libelle }}</td>
            <td>{{ $demande->lieu_cible }}</td>
            <td>{{ $demande->langue }}</td>
            <td>{{ $demande->sexe }}</td>
            <td>{{ $demande->salaire }}</td>
            <td>{{ $demande->type_salaire }}</td>
            <td>{{ $demande->heure_de_travail_par_jours }}</td>
            <td>{{ $demande->experience }}</td>
            <td>{{ $demande->motivation }}</td>
            <td>
                 <a class="btn btn-info" href="{{ route('demandes.show',$demande->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('demandes.edit',$demande->id) }}">Edit</a>
                <form action="{{ route('demandes.destroy',$demande->id) }}" method="POST">
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection