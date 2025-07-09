<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quartiers;


/**
 * @OA\Tag(
 *     name="Quartiers",
 *     description="Gestion des quartiers"
 * )
 */
class QuartiersController extends Controller
{
    /**
     * @OA\Get(
     *     path="/quartiers",
     *     summary="Liste tous les quartiers",
     *     tags={"Quartiers"},
     *     @OA\Response(response=200, description="Succès", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Quartiers")))
     * )
     */
    public function index() {
        return Quartiers::all();
    }

/**
 * @OA\Post(
 *     path="/quartiers",
 *     summary="Créer un quartier",
 *     tags={"Quartiers"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Quartiers")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Quartier créé",
 *         @OA\JsonContent(ref="#/components/schemas/Quartiers")
 *     )
 * )
 */

    public function store(Request $r) {
        return Quartiers::create($r->all());
    }

    /**
     * @OA\Get(
     *     path="/quartiers/{id}",
     *     summary="Afficher un quartier",
     *     tags={"Quartiers"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Quartier trouvé", @OA\JsonContent(ref="#/components/schemas/Quartiers")),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function show($id) {
        return Quartiers::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/quartiers/{id}",
     *     summary="Mettre à jour un quartier",
     *     tags={"Quartiers"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/Quartiers")),
     *     @OA\Response(response=200, description="Quartier mis à jour", @OA\JsonContent(ref="#/components/schemas/Quartiers")),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function update(Request $r, $id) {
        $o = Quartiers::findOrFail($id);
        $o->update($r->all());
        return $o;
    }

    /**
     * @OA\Delete(
     *     path="/quartiers/{id}",
     *     summary="Supprimer un quartier",
     *     tags={"Quartiers"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Quartier supprimé"),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function destroy($id) {
        Quartiers::destroy($id);
        return response()->json(null, 204);
    }
}

