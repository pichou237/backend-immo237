<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeUtilisateurs;


/**
 * @OA\Tag(
 *     name="TypeUtilisateurs",
 *     description="Gestion des types d'utilisateur"
 * )
 */
class TypeUtilisateursController extends Controller
{
    /**
     * @OA\Get(
     *     path="/type-utilisateurs",
     *     summary="Liste tous les types d'utilisateur",
     *     tags={"TypeUtilisateurs"},
     *     @OA\Response(response=200, description="Succès", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/TypeUtilisateurs")))
     * )
     */
    public function index() {
        return TypeUtilisateurs::all();
    }

/**
 * @OA\Post(
 *     path="/type-utilisateurs",
 *     summary="Créer un type d'utilisateur",
 *     tags={"TypeUtilisateurs"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/TypeUtilisateurs")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Type créé",
 *         @OA\JsonContent(ref="#/components/schemas/TypeUtilisateurs")
 *     )
 * )
 */

    public function store(Request $r) {
        return TypeUtilisateurs::create($r->all());
    }

    /**
     * @OA\Get(
     *     path="/type-utilisateurs/{id}",
     *     summary="Afficher un type d'utilisateur",
     *     tags={"TypeUtilisateurs"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Type trouvé", @OA\JsonContent(ref="#/components/schemas/TypeUtilisateurs")),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function show($id) {
        return TypeUtilisateurs::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/type-utilisateurs/{id}",
     *     summary="Mettre à jour un type d'utilisateur",
     *     tags={"TypeUtilisateurs"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/TypeUtilisateurs")),
     *     @OA\Response(response=200, description="Type mis à jour", @OA\JsonContent(ref="#/components/schemas/TypeUtilisateurs")),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function update(Request $r, $id) {
        $o = TypeUtilisateurs::findOrFail($id);
        $o->update($r->all());
        return $o;
    }

    /**
     * @OA\Delete(
     *     path="/type-utilisateurs/{id}",
     *     summary="Supprimer un type d'utilisateur",
     *     tags={"TypeUtilisateurs"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Type supprimé"),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function destroy($id) {
        TypeUtilisateurs::destroy($id);
        return response()->json(null, 204);
    }
}

