<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistoriquePayements;

/**
 * @OA\Tag(
 *     name="HistoriquePayements",
 *     description="Gestion des historiques de payement"
 * )
 */
class HistoriquePayementsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/historique-payements",
     *     summary="Liste tous les historiques de payement",
     *     tags={"HistoriquePayements"},
     *     @OA\Response(response=200, description="Succès", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/HistoriquePayements")))
     * )
     */
    public function index() {
        return HistoriquePayements::all();
    }

 /**
 * @OA\Post(
 *     path="/historique-payements",
 *     summary="Créer un historique de payement",
 *     tags={"HistoriquePayements"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/HistoriquePayements")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Historique créé",
 *         @OA\JsonContent(ref="#/components/schemas/HistoriquePayements")
 *     )
 * )
 */

    public function store(Request $r) {
        return HistoriquePayements::create($r->all());
    }

    /**
     * @OA\Get(
     *     path="/historique-payements/{id}",
     *     summary="Afficher un historique de payement",
     *     tags={"HistoriquePayements"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Historique trouvé", @OA\JsonContent(ref="#/components/schemas/HistoriquePayements")),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function show($id) {
        return HistoriquePayements::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/historique-payements/{id}",
     *     summary="Mettre à jour un historique de payement",
     *     tags={"HistoriquePayements"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/HistoriquePayements")),
     *     @OA\Response(response=200, description="Historique mis à jour", @OA\JsonContent(ref="#/components/schemas/HistoriquePayements")),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function update(Request $r, $id) {
        $o = HistoriquePayements::findOrFail($id);
        $o->update($r->all());
        return $o;
    }

    /**
     * @OA\Delete(
     *     path="/historique-payements/{id}",
     *     summary="Supprimer un historique de payement",
     *     tags={"HistoriquePayements"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Historique supprimé"),
     *     @OA\Response(response=404, description="Non trouvé")
     * )
     */
    public function destroy($id) {
        HistoriquePayements::destroy($id);
        return response()->json(null, 204);
    }
}

