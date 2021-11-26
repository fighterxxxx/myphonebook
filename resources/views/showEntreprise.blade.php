@extends('layouts.app')
@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-4">Visualisation d'une entreprise</h6>
        <div class="col-6 justify-content-center">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    <h3>{{ session()->get('success') }}</h3>
                </div>
            @endif
            @if (session()->has('fail'))
                <div class="alert alert-danger">
                    <h3>{{ session()->get('fail') }}</h3>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form>
                @csrf

                <div class="form-group">
                    <label for="nom">Nom de l'entreprise</label>
                    <input type="text" class="form-control" name="nom" id="nom" value="{{ $entreprise->nom }}" readonly>

                </div>
                <div class="form-group">
                    <label for="rue">Rue</label>
                    <input type="text" class="form-control" name="rue" id="rue" value="{{ $entreprise->rue }}" readonly>

                </div>
                <div class="form-group">
                    <label for="cp">Code Postal</label>
                    <input type="text" class="form-control" name="cp" id="cp" value="{{ $entreprise->cp }}" readonly>

                </div>
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" class="form-control" name="ville" id="cp" value="{{ $entreprise->ville }}"
                        readonly>

                </div>
                <div class="form-group">
                    <label for="telephone">Numéro de téléphone</label>
                    <input type="text" class="form-control" name="telephone" id="telephone"
                        value="{{ $entreprise->téléphone }}" readonly>

                </div>
                <div class="form-group">
                    <label for="email">Adresse mail</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                        value="{{ $entreprise->email }}" placeholder="a@a.a" readonly>
                </div>
                <div class="form-group">
                    <label for="creation">Créé le </label>
                    <input type="text" class="form-control" name="creation" id="creation"
                        value="{{ $entreprise->created_at }}" readonly>

                </div>
                <div class="form-group">
                    <label for="updated_at">Modifié le</label>
                    <input type="text" class="form-control" name="updated_at" id="updated_at"
                        value="{{ $entreprise->updated_at }}" readonly>

                </div>

            </form>
        </div>
    </div>
@endsection
