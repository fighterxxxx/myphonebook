@extends('layouts.app')
@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-4"> Liste des entreprises </h6>
        <div class=" mt-4 justify-content-center">
            <div class="d-flex justify-content-end mb-4">
                <a href={{ route('entreprises.create') }} class="btn btn-primary">Ajouter</a>
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
                        <th scope="col">téléphone</th>
                        <th scope="col">email</th>
                        <th scope="col">ville</th>
                        <th scope="col">code postal</th>
                        <th scope="col">action</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($entreprises as $entreprise)
                        <tr>
                            <th scope="row">{{ $entreprise->id }}</th>
                            <td><a
                                    href="{{ route('entreprises.show', ['entreprise' => $entreprise]) }}">{{ $entreprise->nom }}</a>
                            </td>
                            <td>{{ $entreprise->téléphone }}</td>
                            <td>{{ $entreprise->email }}</td>
                            <td>{{ $entreprise->ville }}</td>
                            <td>{{ $entreprise->cp }}</td>
                            <td>
                                <a href="{{ route('entreprises.edit', ['entreprise' => $entreprise->id]) }}"
                                    class="btn btn-info">Editer</a>
                                <a href="#" class="btn btn-danger"
                                    onclick="if(confirm('Voulez-vous vraiment supprimer cet entreprise?')){ document.getElementById('form-{{ $entreprise->id }}').submit()}">Supprimer</a>

                                <form id="form-{{ $entreprise->id }}"
                                    action="{{ route('entreprises.supprimer', ['entreprise' => $entreprise->id]) }}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
                {{ $entreprises->links() }}

            </table>
        </div>
    </div>
@endsection
