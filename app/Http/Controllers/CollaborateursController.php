<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Collaborateur;
use Illuminate\Http\Request;


class CollaborateursController extends Controller
{
    public function index()
    {
        $collaborateurs =  Collaborateur::orderBy("nom", "asc")->paginate(10);
        return view("collaborateursdt", compact("collaborateurs"));
    }

    public function create()
    {
        $entreprises =  Entreprise::all();
        return view("createCollaborateur", compact("entreprises"));
    }

    public function edit(Collaborateur $collaborateur)
    {
        $entreprises =  Entreprise::all();
        return view("editCollaborateur", compact("collaborateur", "entreprises"));
    }

    public function show(Collaborateur $collaborateur)
    {
        $entreprises =  Entreprise::all();
        return view("showCollaborateur", compact("collaborateur", "entreprises"));
    }
    public function store(Request $request)
    {
        $request->validate([
            "nom" => "required:nom",
            "civilité" => "required:civilité",
            "prenom" => "required:prenom",
            "rue" => "required:rue",
            "ville" => "required:ville",
            "telephone" => "required:téléphone|digits:10 ",
            "cp"  => "required:cp",
            "email" => "required:email"
        ]);
        Collaborateur::create([
            "civilité" => $request->civilité,
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "rue" => $request->rue,
            "cp"  => $request->cp,
            "ville" => $request->ville,
            "téléphone" => $request->telephone,
            "email" => $request->email,
            "entreprise_id" => $request->entreprise_id
        ]);

        return back()->with("success", "Le collaborateur a été ajouté avec succès");
    }

    public function update(Request $request, Collaborateur $collaborateur)
    {
        $request->validate([
            "nom" => "required:nom",
            "civilité" => "required:civilité",
            "prenom" => "required:prenom",
            "rue" => "required:rue",
            "ville" => "required:ville",
            "telephone" => "required:téléphone|digits:10 ",
            "cp"  => "required:cp",
            "email" => "required:email"
        ]);
        $collaborateur->update([
            "civilité" => $request->civilité,
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "rue" => $request->rue,
            "cp"  => $request->cp,
            "ville" => $request->ville,
            "téléphone" => $request->telephone,
            "email" => $request->email,
            "entreprise_id" => $request->entreprise_id
        ]);

        return back()->with("success", "Le collaborateur a été modifiée avec succès");
    }

    public function delete(Collaborateur $collaborateur)
    {
        $nom = $collaborateur->nom;
        $collaborateur->delete();
        return back()->with("successDelete", "Le collaborateur $nom a été supprimé!");
    }
}
