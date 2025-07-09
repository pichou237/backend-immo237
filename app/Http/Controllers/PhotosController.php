<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photos;


/**
 * @OA\Tag(
 *     name="Photos",
 *     description="Gestion des photos"
 * )
 */
class PhotosController extends Controller
{
    /**
     * @OA\Get(
     *     path="/photos",
     *     summary="Liste toutes les photos",
     *     tags={"Photos"},
     *     @OA\Response(response=200, description="Succès", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Photos")))
     * )
     */
    public function index() {
        return Photos::all();
    }

    /**
 * @OA\Post(
 *     path="/photos",
 *     summary="Créer une photo",
 *     tags={"Photos"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Photos")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Photo créée",
 *         @OA\JsonContent(ref="#/components/schemas/Photos")
 *     )
 * )
 */

    public function store(Request $r) {
        return Photos::create($r->all());
    }

    /**
     * @OA\Get(
     *     path="/photos/{id}",
     *     summary="Afficher une photo",
     *     tags={"Photos"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Photo trouvée", @OA\JsonContent(ref="#/components/schemas/Photos")),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function show($id) {
        return Photos::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/photos/{id}",
     *     summary="Mettre à jour une photo",
     *     tags={"Photos"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/Photos")),
     *     @OA\Response(response=200, description="Photo mise à jour", @OA\JsonContent(ref="#/components/schemas/Photos")),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function update(Request $r, $id) {
        $o = Photos::findOrFail($id);
        $o->update($r->all());
        return $o;
    }

    /**
     * @OA\Delete(
     *     path="/photos/{id}",
     *     summary="Supprimer une photo",
     *     tags={"Photos"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Photo supprimée"),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function destroy($id) {
        Photos::destroy($id);
        return response()->json(null, 204);
    }
}

