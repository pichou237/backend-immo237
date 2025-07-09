<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeBiens;

/**
 * @OA\Tag(
 *     name="TypeBiens",
 *     description="Gestion des TypeBiens immobiliers"
 * )
 */

class TypeBiensController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/type_biens",
     *     tags={"TypeBiens"},
     *     summary="Lister types",
     *     @OA\Response(response=200, description="OK")
     * )
     */
    public function index()
    {
        return TypeBiens::all();
    }

/**
 * @OA\Post(
 *     path="/api/type_biens",
 *     tags={"TypeBiens"},
 *     summary="Créer type",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent()
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Créé"
 *     )
 * )
 */

    public function store(Request $r)
    {
        return TypeBiens::create($r->all());
    }

    /**
     * @OA\Get(
     *     path="/api/type_biens/{id}",
     *     tags={"TypeBiens"},
     *     summary="Afficher type",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Détails")
     * )
     */
    public function show($id)
    {
        return TypeBiens::findOrFail($id);
    }

/**
 * @OA\Put(
 *     path="/api/type_biens/{id}",
 *     tags={"TypeBiens"},
 *     summary="Modifier type",
 *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
 *     @OA\RequestBody(@OA\JsonContent(), required=true),
 *     @OA\Response(response=200, description="Modifié")
 * )
 */

    public function update(Request $r, $id)
    {
        $o = TypeBiens::findOrFail($id);
        $o->update($r->all());
        return $o;
    }

    /**
     * @OA\Delete(
     *     path="/api/type_biens/{id}",
     *     tags={"TypeBiens"},
     *     summary="Supprimer type",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Supprimé")
     * )
     */
    public function destroy($id)
    {
        TypeBiens::destroy($id);
        return response()->json(null, 204);
    }
}
