<?php

namespace App\Http\Controllers;

use App\Models\Emprunteur;
use Illuminate\Http\Request;

class EmprunteurController extends Controller
{
    public function index(Request $request)
    {
        $recherche = $request->recherche;

        $emprunteurs = Emprunteur::when($recherche, function ($query, $recherche) {
            $query->where('nom', 'like', '%' . $recherche . '%')
                  ->orWhere('prenom', 'like', '%' . $recherche . '%')
                  ->orWhere('telephone', 'like', '%' . $recherche . '%');
        })->get();

        return view('emprunteurs.index', compact('emprunteurs', 'recherche'));
    }

    public function create()
    {
        return view('emprunteurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
        ]);

        Emprunteur::create($request->all());

        return redirect()->route('emprunteurs.index')
            ->with('success', 'Emprunteur ajouté avec succès.');
    }

    public function edit(string $id)
    {
        $emprunteur = Emprunteur::findOrFail($id);

        return view('emprunteurs.edit', compact('emprunteur'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
        ]);

        $emprunteur = Emprunteur::findOrFail($id);

        $emprunteur->update($request->all());

        return redirect()->route('emprunteurs.index')
            ->with('success', 'Emprunteur modifié avec succès.');
    }

    public function destroy(string $id)
    {
        $emprunteur = Emprunteur::findOrFail($id);

        $emprunteur->delete();

        return redirect()->route('emprunteurs.index')
            ->with('success', 'Emprunteur supprimé avec succès.');
    }
}
