<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeBiens;


/**
 * @OA\Tag(
 *     name="TypePayements",
 *     description="Gestion des types de payement"
 * )
 */
class TypePayementsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/type-payements",
     *     summary="Liste tous les types de payement",
     *     tags={"TypePayements"},
     *     @OA\Response(response=200, description="Succès", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/TypePayements")))
     * )
     */
    public function index() {
        return TypePayements::all();
    }

/**
 * @OA\Post(
 *     path="/type-payements",
 *     summary="Créer un type de payement",
 *     tags={"TypePayements"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/TypePayements")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Type créé",
 *         @OA\JsonContent(ref="#/components/schemas/TypePayements")
 *     )
 * )
 */

    public function store(Request $r) {
        return TypePayements::create($r->all());
    }

    /**
     * @OA\Get(
     *     path="/type-payements/{id}",
     *     summary="Afficher un type de payement",
     *     tags={"TypePayements"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Type trouvé", @OA\JsonContent(ref="#/components/schemas/TypePayements")),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function show($id) {
        return TypePayementS::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/type-payements/{id}",
     *     summary="Mettre à jour un type de payement",
     *     tags={"TypePayements"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/TypePayements")),
     *     @OA\Response(response=200, description="Type mis à jour", @OA\JsonContent(ref="#/components/schemas/TypePayements")),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function update(Request $r, $id) {
        $o = TypePayements::findOrFail($id);
        $o->update($r->all());
        return $o;
    }

    /**
     * @OA\Delete(
     *     path="/type-payements/{id}",
     *     summary="Supprimer un type de payement",
     *     tags={"TypePayements"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Type supprimé"),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function destroy($id) {
        TypePayements::destroy($id);
        return response()->json(null, 204);
    }
}

