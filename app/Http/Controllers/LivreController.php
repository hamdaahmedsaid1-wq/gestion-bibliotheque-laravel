<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index(Request $request)
    {
        $recherche = $request->recherche;

        $livres = Livre::when($recherche, function ($query, $recherche) {
            $query->where('titre', 'like', '%' . $recherche . '%')
                  ->orWhere('auteur', 'like', '%' . $recherche . '%')
                  ->orWhere('categorie', 'like', '%' . $recherche . '%');
        })->get();

        return view('livres.index', compact('livres', 'recherche'));
    }

    public function create()
    {
        return view('livres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'annee' => 'required|integer|min:1000|max:2100',
            'quantite' => 'required|integer|min:1',
        ]);
        $imagePath = null;

if ($request->hasFile('image')) {
    $imagePath = $request->file('image')->store('livres', 'public');
}

       Livre::create([
    'titre' => $request->titre,
    'auteur' => $request->auteur,
    'categorie' => $request->categorie,
    'annee' => $request->annee,
    'quantite' => $request->quantite,
    'image' => $imagePath,
]);
     return redirect()->route('livres.index')
    ->with('success', 'Livre ajouté avec succès.');


}

  public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $livre = Livre::findOrFail($id);
        return view('livres.edit', compact('livre'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'annee' => 'required|integer|min:1000|max:2100',
            'quantite' => 'required|integer|min:1',
        ]);

        $livre = Livre::findOrFail($id);
        $livre->update($request->all());

        return redirect()->route('livres.index')
                         ->with('success', 'Livre modifié avec succès.');
    }

    public function destroy(string $id)
    {
        $livre = Livre::findOrFail($id);
        $livre->delete();

        return redirect()->route('livres.index')
                         ->with('success', 'Livre supprimé avec succès.');
    }
}