<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Biens;
use App\Models\Villes;
use App\Models\Contrats;
use App\Models\Payements;
use App\Models\Reservations;
use App\Models\Utilisateurs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{/**
     * Récupère les statistiques du tableau de bord.
     */
    public function stats()
    {
        $stats = [
            'total_biens' => Biens::count(),
            'total_utilisateurs' => Utilisateurs::count(),
            'total_reservations' => Reservations::count(),
            'total_contrats' => Contrats::count(),
            'total_avis' => Avis::count(),
            'total_payements' => Payements::count(),
            'montant_total' => Payements::sum('montant'),
            'dernier_payement' => Payements::orderBy('created_at', 'desc')->first(),
            'dernieres_reservations' => Reservations::with('bien', 'utilisateur')->orderBy('created_at', 'desc')->take(5)->get(),
            'biens_plus_reserves' => Biens::withCount('reservations')->orderBy('reservations_count', 'desc')->take(5)->get(),
            'top_villes' => Villes::withCount('biens')->orderBy('biens_count', 'desc')->take(5)->get(),
        ];

        return response()->json($stats);
    }
}
