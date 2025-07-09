<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contrats;

/**
 * @OA\Tag(
 *     name="Contrats",
 *     description="Gestion des contrats"
 * )
 */
class ContratsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/contrats",
     *     summary="Liste tous les contrats",
     *     tags={"Contrats"},
     *     @OA\Response(response=200, description="Succès", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Contrats")))
     * )
     */
    public function index() {
        return Contrats::all();
    }

    /**
     * @OA\Post(
     *     path="/contrats",
     *     summary="Créer un contrat",
     *     tags={"Contrats"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Contrats")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Contrat créé",
     *         @OA\JsonContent(ref="#/components/schemas/Contrats")
     *     )
     * )
     */

    public function store(Request $r) {
        return Contrats::create($r->all());
    }

    /**
     * @OA\Get(
     *     path="/contrats/{id}",
     *     summary="Afficher un contrat",
     *     tags={"Contrats"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Contrat trouvé", @OA\JsonContent(ref="#/components/schemas/Contrats")),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function show($id) {
        return Contrats::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/contrats/{id}",
     *     summary="Mettre à jour un contrat",
     *     tags={"Contrats"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/Contrats")),
     *     @OA\Response(response=200, description="Contrat mis à jour", @OA\JsonContent(ref="#/components/schemas/Contrats")),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function update(Request $r, $id) {
        $o = Contrats::findOrFail($id);
        $o->update($r->all());
        return $o;
    }

    /**
     * @OA\Delete(
     *     path="/contrats/{id}",
     *     summary="Supprimer un contrat",
     *     tags={"Contrats"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Contrat supprimé"),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function destroy($id) {
        Contrats::destroy($id);
        return response()->json(null, 204);
    }
}
