<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Avis;

/**
 * @OA\Tag(
 *     name="Avis",
 *     description="Gestion des avis"
 * )
 */
class AvisController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/avis",
     *     summary="Liste tous les avis",
     *     tags={"Avis"},
     *     @OA\Response(response=200, description="Succès", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Avis")))
     * )
     */

    public function index() {
        return Avis::all();
    }

    /**
     * @OA\Post(
     *     path="/api/avis",
     *     summary="Créer un avis",
     *     tags={"Avis"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Avis")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Avis créé",
     *         @OA\JsonContent(ref="#/components/schemas/Avis")
     *     )
     * )
     */
    public function store(Request $r) {
        return Avis::create($r->all());
    }



    /**
     * @OA\Get(
     *     path="/api/avis/{id}",
     *     summary="Afficher un avis",
     *     tags={"Avis"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Avis trouvé", @OA\JsonContent(ref="#/components/schemas/Avis")),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function show($id) {
        return Avis::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/api/avis/{id}",
     *     summary="Mettre à jour un avis",
     *     tags={"Avis"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/Avis")),
     *     @OA\Response(response=200, description="Avis mis à jour", @OA\JsonContent(ref="#/components/schemas/Avis")),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function update(Request $r, $id) {
        $o = Avis::findOrFail($id);
        $o->update($r->all());
        return $o;
    }

    /**
     * @OA\Delete(
     *     path="/api/avis/{id}",
     *     summary="Supprimer un avis",
     *     tags={"Avis"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Avis supprimé"),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function destroy($id) {
        Avis::destroy($id);
        return response()->json(null, 204);
    }
}

