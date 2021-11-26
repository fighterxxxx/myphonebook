@extends('layouts.app')
@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-4"> Liste des collaborateurs </h6>
        <div class=" mt-4 justify-content-center">
            <div class="d-flex justify-content-end mb-4">
                <a href={{ route('collaborateurs.create') }} class="btn btn-primary">Ajouter</a>
            </div>
            @if (session()->has('successDelete'))
                <div class="alert alert-success">
                    <h3>{{ session()->get('successDelete') }}</h3>
                </div>
            @endif
            @if (session()->has('fail'))
                <div class="alert alert-danger">
                    <h3>{{ session()->get('fail') }}</h3>
                </div>
            @endif
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">nom</th>
                        <th scope="col">prénom</th>
                        <th scope="col">numéro</th>
                        <th scope="col">email</th>
                        <th scope="col">nom de l'entreprise</th>
                        <th scope="col">numéro de l'entreprise</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collaborateurs as $collaborateur)
                        <tr>
                            <th scope="row">{{ $collaborateur->id }}</th>
                            <td><a
                                    href="{{ route('collaborateurs.show', ['collaborateur' => $collaborateur]) }}">{{ $collaborateur->nom }}</a>
                            </td>
                            <td>{{ $collaborateur->prenom }}</td>
                            <td>{{ $collaborateur->téléphone }}</td>
                            <td>{{ $collaborateur->email }}</td>
                            <td>{{ $collaborateur->entreprise->nom }}</td>
                            <td>{{ $collaborateur->entreprise->téléphone }}</td>

                            <td>
                                <a href="{{ route('collaborateurs.edit', ['collaborateur' => $collaborateur->id]) }}"
                                    class="btn btn-info">Editer</a>
                                <a href="#" class="btn btn-danger"
                                    onclick="if(confirm('Voulez-vous vraiment supprimer cet entreprise?')){ document.getElementById('form-{{ $collaborateur->id }}').submit()}">Supprimer</a>

                                <form id="form-{{ $collaborateur->id }}"
                                    action="{{ route('collaborateurs.supprimer', ['collaborateur' => $collaborateur->id]) }}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
                {{ $collaborateurs->links() }}
            </table>
        </div>
    </div>
@endsection
