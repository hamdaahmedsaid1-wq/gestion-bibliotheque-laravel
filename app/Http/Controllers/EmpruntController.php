<?php

namespace App\Http\Controllers;

use App\Models\Emprunt;
use App\Models\Livre;
use App\Models\Emprunteur;
use Illuminate\Http\Request;


class EmpruntController extends Controller
{
    public function index()
    {
        $emprunts = Emprunt::with(['livre', 'emprunteur'])->get();

        return view('emprunts.index', compact('emprunts'));
    }

  

  public function store(Request $request)
{
    $request->validate([
        'livre_id' => 'required',
        'emprunteur_id' => 'required',
        'date_emprunt' => 'required|date',
        'date_retour_prevue' => 'required|date',
    ]);

    $livre = Livre::findOrFail($request->livre_id);

    if ($livre->quantite <= 0) {
        return redirect()->back()
            ->with('error', 'Ce livre n’est plus disponible.');
    }

    Emprunt::create([
        'livre_id' => $request->livre_id,
        'emprunteur_id' => $request->emprunteur_id,
        'date_emprunt' => $request->date_emprunt,
        'date_retour_prevue' => $request->date_retour_prevue,
        'statut' => 'en cours',
    ]);

    $livre->decrement('quantite');

    return redirect()->route('emprunts.index')
        ->with('success', 'Emprunt enregistré avec succès.');
}

public function create()
{
    $livres = Livre::where('quantite', '>', 0)->get();
    $emprunteurs = Emprunteur::all();

    return view('emprunts.create', compact('livres', 'emprunteurs'));
}

    public function destroy(string $id)
    {
        $emprunt = Emprunt::findOrFail($id);
        $emprunt->delete();

        return redirect()->route('emprunts.index')
            ->with('success', 'Emprunt supprimé avec succès.');
    }
   public function retourner($id)
{
    $emprunt = Emprunt::findOrFail($id);

    if ($emprunt->statut == 'retourné') {
        return redirect()->route('emprunts.index')
            ->with('success', 'Ce livre est déjà retourné.');
    }

    $emprunt->update([
        'statut' => 'retourné',
        'date_retour_effective' => now(),
    ]);

    $emprunt->livre->increment('quantite');

    return redirect()->route('emprunts.index')
        ->with('success', 'Livre retourné avec succès.');
}
}
