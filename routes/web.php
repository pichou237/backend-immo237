<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TypeBiensController;
use App\Http\Controllers\BiensController;
use App\Http\Controllers\CategoriesBiensController;
use App\Http\Controllers\VillesController;
use App\Http\Controllers\QuartiersController;
use App\Http\Controllers\TypeUtilisateursController;
use App\Http\Controllers\UtilisateursController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\ContratsController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\TypePayementsController;
use App\Http\Controllers\PayementsController;
use App\Http\Controllers\HistoriquePayementsController;

use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/test-fallback', function () {
    return response()->json(['message' => 'Fallback API route works']);
});

// Route::get('/api/documentation', function () {
//     return view('l5-swagger::index', [
//         'documentation' => 'default',
//         'documentationTitle' => config('app.name') . ' API Documentation'
//     ]);
// });



/*

|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Ici sont enregistrées toutes les routes API de l'application.
| Ces routes sont automatiquement préfixées par /api via le RouteServiceProvider.
|
*/


// ✅ Ressources API RESTful
// TypeBien
Route::apiResource('api/type_biens', TypeBiensController::class);

// Biens
Route::apiResource('api/biens', BiensController::class);

// CategorieBien
Route::apiResource('api/categorie_biens', CategoriesBiensController::class);

// Ville
Route::apiResource('api/villes', VillesController::class);

// Quartier
Route::apiResource('api/quartiers', QuartiersController::class);

// TypeUtilisateur
Route::apiResource('api/type_utilisateurs', TypeUtilisateursController::class);

// Utilisateur
Route::apiResource('api/utilisateurs', UtilisateursController::class);

// Reservation
Route::apiResource('api/reservations', ReservationsController::class);

// Contrat
Route::apiResource('api/contrats', ContratsController::class);

// Photo
Route::apiResource('api/photos', PhotosController::class);

// Avis
Route::apiResource('api/avis', AvisController::class);

// TypePayement
Route::apiResource('api/type_payements', TypePayementsController::class);

// Payement
Route::apiResource('api/payements', PayementsController::class);

// HistoriquePayement
Route::apiResource('api/historique_payements', HistoriquePayementsController::class);



Route::get('/dashboard/stats', [DashboardController::class, 'stats']);
Route::get('api/liste_biens', [BiensController::class, 'biens']);