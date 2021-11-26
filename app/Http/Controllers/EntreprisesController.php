<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class EntreprisesController extends Controller
{
    public function index()
    {
        $entreprises = Entreprise::orderBy("nom", "asc")->paginate(5);
        return view('entreprisesdt', compact("entreprises"));
    }

    public function create()
    {
        return view("createEntreprise");
    }

    public function edit(Entreprise $entreprise)
    {
        return view("editEntreprise", compact("entreprise"));
    }
    public function show(Entreprise $entreprise)
    {
        return view("showEntreprise", compact("entreprise"));
    }


    public function store(Request $request)
    {
        $request->validate([
            "nom" => "required:nom",
            "rue" => "required:rue",
            "cp"  => "required:cp",
            "ville" => "required:ville",
            "telephone" => "required:téléphone|digits:10 ",
            "email" => "required:email"
        ]);
        Entreprise::create([
            "nom" => $request->nom,
            "rue" => $request->rue,
            "cp"  => $request->cp,
            "ville" => $request->ville,
            "téléphone" => $request->telephone,
            "email" => $request->email,
        ]);

        return back()->with("success", "L'entreprise a été ajouté avec succès");
    }
    public function update(Request $request, Entreprise $entreprise)
    {
        $request->validate([
            "nom" => "required:nom",
            "rue" => "required:rue",
            "cp"  => "required:cp",
            "ville" => "required:ville",
            "telephone" => "required:téléphone",
            "email" => "required:email"
        ]);
        $entreprise->update([
            "nom" => $request->nom,
            "rue" => $request->rue,
            "cp"  => $request->cp,
            "ville" => $request->ville,
            "téléphone" => $request->telephone,
            "email" => $request->email,
        ]);

        return back()->with("success", "L'entreprise a été modifiée avec succès");
    }

    public function delete(Entreprise $entreprise)
    {
        $nom = $entreprise->nom;
        $entreprise->delete();
        return back()->with("successDelete", "L'entreprise $nom a été supprimé!");
    }
}
