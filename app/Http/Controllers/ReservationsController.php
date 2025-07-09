<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservations;


/**
 * @OA\Tag(
 *     name="Reservations",
 *     description="Gestion des réservations"
 * )
 */
class ReservationsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/reservations",
     *     summary="Liste toutes les réservations",
     *     tags={"Reservations"},
     *     @OA\Response(response=200, description="Succès", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Reservations")))
     * )
     */
    public function index() {
        return Reservations::all();
    }

/**
 * @OA\Post(
 *     path="/reservations",
 *     summary="Créer une réservation",
 *     tags={"Reservations"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Reservations")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Réservation créée",
 *         @OA\JsonContent(ref="#/components/schemas/Reservations")
 *     )
 * )
 */

    public function store(Request $r) {
        return Reservations::create($r->all());
    }

    /**
     * @OA\Get(
     *     path="/reservations/{id}",
     *     summary="Afficher une réservation",
     *     tags={"Reservations"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Réservation trouvée", @OA\JsonContent(ref="#/components/schemas/Reservations")),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function show($id) {
        return Reservations::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/reservations/{id}",
     *     summary="Mettre à jour une réservation",
     *     tags={"Reservations"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/Reservations")),
     *     @OA\Response(response=200, description="Réservation mise à jour", @OA\JsonContent(ref="#/components/schemas/Reservations")),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function update(Request $r, $id) {
        $o = Reservations::findOrFail($id);
        $o->update($r->all());
        return $o;
    }

    /**
     * @OA\Delete(
     *     path="/reservations/{id}",
     *     summary="Supprimer une réservation",
     *     tags={"Reservations"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Réservation supprimée"),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function destroy($id) {
        Reservations::destroy($id);
        return response()->json(null, 204);
    }
}

