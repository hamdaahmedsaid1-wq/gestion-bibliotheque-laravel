<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Emprunteur;
use App\Models\Emprunt;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLivres = Livre::count();
        $totalQuantite = Livre::sum('quantite');
        $totalEmprunteurs = Emprunteur::count();
        $totalEmprunts = Emprunt::count();
        $empruntsEnCours = Emprunt::where('statut', 'en cours')->count();
        $empruntsRetournes = Emprunt::where('statut', 'retourné')->count();
      
        return view('dashboard', [
    'totalLivres' => $totalLivres,
    'totalQuantite' => $totalQuantite,
    'totalEmprunteurs' => $totalEmprunteurs,
    'totalEmprunts' => $totalEmprunts,
    'empruntsEnCours' => $empruntsEnCours,
    'empruntsRetournes' => $empruntsRetournes,
]);
    }
}