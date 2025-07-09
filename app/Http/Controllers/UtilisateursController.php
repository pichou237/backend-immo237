<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Utilisateurs;


/**
 * @OA\Tag(
 *     name="Utilisateurs",
 *     description="Gestion des utilisateurs"
 * )
 */
class UtilisateursController extends Controller
{
    /**
     * @OA\Get(
     *     path="/utilisateurs",
     *     summary="Liste tous les utilisateurs",
     *     tags={"Utilisateurs"},
     *     @OA\Response(response=200, description="Succès", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Utilisateurs")))
     * )
     */
    public function index() {
        return Utilisateurs::all();
    }

/**
 * @OA\Post(
 *     path="/utilisateurs",
 *     summary="Créer un utilisateur",
 *     tags={"Utilisateurs"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Utilisateurs")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Utilisateur créé",
 *         @OA\JsonContent(ref="#/components/schemas/Utilisateurs")
 *     )
 * )
 */

    public function store(Request $r) {
        return Utilisateurs::create($r->all());
    }

    /**
     * @OA\Get(
     *     path="/utilisateurs/{id}",
     *     summary="Afficher un utilisateur",
     *     tags={"Utilisateurs"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Utilisateur trouvé", @OA\JsonContent(ref="#/components/schemas/Utilisateurs")),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function show($id) {
        return Utilisateurs::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/utilisateurs/{id}",
     *     summary="Mettre à jour un utilisateur",
     *     tags={"Utilisateurs"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/Utilisateurs")),
     *     @OA\Response(response=200, description="Utilisateur mis à jour", @OA\JsonContent(ref="#/components/schemas/Utilisateurs")),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function update(Request $r, $id) {
        $o = Utilisateurs::findOrFail($id);
        $o->update($r->all());
        return $o;
    }

    /**
     * @OA\Delete(
     *     path="/utilisateurs/{id}",
     *     summary="Supprimer un utilisateur",
     *     tags={"Utilisateurs"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Utilisateur supprimé"),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function destroy($id) {
        Utilisateurs::destroy($id);
        return response()->json(null, 204);
    }
}
