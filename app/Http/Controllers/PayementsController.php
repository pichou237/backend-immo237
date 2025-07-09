<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payements;


/**
 * @OA\Tag(
 *     name="Payements",
 *     description="Gestion des payements"
 * )
 */
class PayementsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/payements",
     *     summary="Liste tous les payements",
     *     tags={"Payements"},
     *     @OA\Response(response=200, description="Succès", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Payements")))
     * )
     */
    public function index() {
        return Payements::all();
    }

/**
 * @OA\Post(
 *     path="/payements",
 *     summary="Créer un payement",
 *     tags={"Payements"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Payements")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Payement créé",
 *         @OA\JsonContent(ref="#/components/schemas/Payements")
 *     )
 * )
 */

    public function store(Request $r) {
        return Payements::create($r->all());
    }

    /**
     * @OA\Get(
     *     path="/payements/{id}",
     *     summary="Afficher un payement",
     *     tags={"Payements"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Payement trouvé", @OA\JsonContent(ref="#/components/schemas/Payements")),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function show($id) {
        return Payements::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/payements/{id}",
     *     summary="Mettre à jour un payement",
     *     tags={"Payements"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/Payements")),
     *     @OA\Response(response=200, description="Payement mis à jour", @OA\JsonContent(ref="#/components/schemas/Payements")),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function update(Request $r, $id) {
        $o = Payements::findOrFail($id);
        $o->update($r->all());
        return $o;
    }

    /**
     * @OA\Delete(
     *     path="/payements/{id}",
     *     summary="Supprimer un payement",
     *     tags={"Payements"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Payement supprimé"),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function destroy($id) {
        Payements::destroy($id);
        return response()->json(null, 204);
    }
}

