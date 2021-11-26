@extends('layouts.app')
@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-4"> Visualisation d'un collaborateur </h6>
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
                    <label for="nom">Civilité</label>
                    <input type="text" class="form-control" name="nom" id="nom" value="{{ $collaborateur->civilité }}"
                        readonly>

                </div>
                <div class="form-group">
                    <label for="nom">Nom </label>
                    <input type="text" class="form-control" name="nom" id="nom" placeholder=""
                        value="{{ $collaborateur->nom }}" required readonly>

                </div>
                <div class="form-group">
                    <label for="prenom">Prénom </label>
                    <input type="text" class="form-control" name="prenom" id="prenom" placeholder=""
                        value="{{ $collaborateur->prenom }}" readonly required>

                </div>
                <div class="form-group">
                    <label for="rue">Rue</label>
                    <input type="text" class="form-control" name="rue" id="rue" placeholder=""
                        value="{{ $collaborateur->rue }}" readonly required>

                </div>
                <div class="form-group">
                    <label for="cp">Code Postal</label>
                    <input type="text" class="form-control" required name="cp" id="cp" placeholder="" pattern="[0-9]{5}"
                        value="{{ $collaborateur->cp }}" readonly>

                </div>
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" class="form-control" name="ville" id="cp" placeholder=""
                        value="{{ $collaborateur->ville }}" required readonly>

                </div>
                <div class="form-group">
                    <label for="telephone">Numéro de téléphone</label>
                    <input type="text" class="form-control" name="telephone" id="telephone" placeholder=""
                        value="{{ $collaborateur->téléphone }}" readonly>

                </div>
                <div class="form-group">
                    <label for="email">Adresse mail</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                        placeholder="a@a.a" value="{{ $collaborateur->email }}" required readonly>

                </div>
                <div class="form-group">
                    <label for="nom">Nom de l'entreprise</label>
                    <input type="text" class="form-control" name="nom" id="nom"
                        value="{{ $collaborateur->entreprise->nom }}" readonly>

                </div>



            </form>


        </div>
    </div>
@endsection
