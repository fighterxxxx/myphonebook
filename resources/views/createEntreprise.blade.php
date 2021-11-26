@extends('layouts.app')
@section('content')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-4"> Ajout d'une entreprise </h6>
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
            <form style="width:65%;" method="post" action="{{ route('entreprises.ajouter') }}">
                @csrf
                <div class="form-group">
                    <label for="nom">Nom de l'entreprise</label>
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="" required>
                    <small id="nomHelp" class="form-text text-muted">Le nom de l'entreprise est obligatoire.</small>
                </div>
                <div class="form-group">
                    <label for="rue">Rue</label>
                    <input type="text" class="form-control" name="rue" id="rue" placeholder="" required>
                    <small id="rueHelp" class="form-text text-muted">La rue est obligatoire.</small>
                </div>
                <div class="form-group">
                    <label for="cp">Code Postal</label>
                    <input type="text" class="form-control" required name="cp" id="cp" placeholder="" pattern="[0-9]{5}">
                    <small id="cpHelp" class="form-text text-muted">Le code postal de l'entreprise est
                        obligatoire. (ex:75000)</small>
                </div>
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" class="form-control" name="ville" id="cp" placeholder="" required>
                    <small id="villeHelp" class="form-text text-muted">La ville est obligatoire.</small>
                </div>
                <div class="form-group">
                    <label for="telephone">Numéro de téléphone</label>
                    <input type="text" class="form-control" name="telephone" id="telephone" placeholder="">
                    <small id="telHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="email">Adresse mail</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                        placeholder="a@a.a" required>
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>


                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('entreprises') }}" class="btn btn-danger">Annuler</a>
            </form>


        </div>
    </div>
@endsection
