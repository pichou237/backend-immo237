<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeBiensController;
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

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Ici sont enregistrées toutes les routes API de l'application.
| Ces routes sont automatiquement préfixées par /api via le RouteServiceProvider.
|
*/

// ✅ Route pour obtenir l'utilisateur connecté avec Sanctum
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ✅ Route de connexion API avec Auth et création de token (via Passport ou Sanctum selon config)
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $user->createToken('API Token')->accessToken;
        return response()->json(['token' => $token]);
    }

    return response()->json(['error' => 'Unauthorized'], 401);
})->name("login");

// ✅ Route de déconnexion via token (nécessite auth:api)
Route::middleware('auth:api')->post('/logout', function (Request $request) {
    $request->user()->token()->revoke();
    return response()->json(['message' => 'Successfully logged out']);
});

// ✅ Ressources API RESTful
// TypeBien
Route::apiResource('type_biens', TypeBiensController::class);

// CategorieBien
Route::apiResource('categorie_biens', CategoriesBiensController::class);

// Ville
Route::apiResource('villes', VillesController::class);

// Quartier
Route::apiResource('quartiers', QuartiersController::class);

// TypeUtilisateur
Route::apiResource('type_utilisateurs', TypeUtilisateursController::class);

// Utilisateur
Route::apiResource('utilisateurs', UtilisateursController::class);

// Reservation
Route::apiResource('reservations', ReservationsController::class);

// Contrat
Route::apiResource('contrats', ContratsController::class);

// Photo
Route::apiResource('photos', PhotosController::class);

// Avis
Route::apiResource('avis', AvisController::class);

// TypePayement
Route::apiResource('type_payements', TypePayementsController::class);

// Payement
Route::apiResource('payements', PayementsController::class);

// HistoriquePayement
Route::apiResource('historique_payements', HistoriquePayementsController::class);


Route::get('/', function () {
    return 'welcome';
});


Route::get('type_biens', [TypeBiensController::class, 'index']);
Route::post('type_biens', [TypeBiensController::class, 'store']);
Route::get('type_biens/{id}', [TypeBiensController::class, 'show']);
Route::put('type_biens/{id}', [TypeBiensController::class, 'update']);
Route::delete('type_biens/{id}', [TypeBiensController::class, 'destroy']);