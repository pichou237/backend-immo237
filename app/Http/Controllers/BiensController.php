<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biens;

/**
 * @OA\Tag(
 *     name="Biens",
 *     description="Gestion des biens immobiliers"
 * )
 */
class BiensController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/biens",
     *     tags={"Biens"},
     *     summary="Liste de tous les biens",
     *     @OA\Response(response=200, description="Liste retournée avec succès")
     * )
     */
    public function index()
    {
        return Biens::all();
    }

    /**
     * @OA\Post(
     *     path="/api/biens",
     *     tags={"Biens"},
     *     summary="Créer un nouveau bien",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Biens")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Bien créé avec succès"
     *     )
     * )
     */


    public function store(Request $request)
    {
        $biens = Biens::create($request->all());
        return response()->json($biens, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/biens/{id}",
     *     tags={"Biens"},
     *     summary="Afficher un bien par son ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID du bien",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Bien trouvé avec succès"),
     *     @OA\Response(response=404, description="Bien non trouvé")
     * )
     */
    public function show($id)
    {
        $bien = Biens::findOrFail($id);
        return response()->json($bien);
    }

    /**
     * @OA\Put(
     *     path="/api/biens/{id}",
     *     tags={"Biens"},
     *     summary="Mettre à jour un bien existant",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID du bien",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Biens")
     *     ),
     *     @OA\Response(response=200, description="Bien mis à jour avec succès")
     * )
     */
    public function update(Request $request, $id)
    {
        $bien = Biens::findOrFail($id);
        $bien->update($request->all());
        return response()->json($bien);
    }

    /**
     * @OA\Delete(
     *     path="/api/biens/{id}",
     *     tags={"Biens"},
     *     summary="Supprimer un bien",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID du bien",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=204, description="Bien supprimé avec succès")
     * )
     */
    public function destroy($id)
    {
        Biens::destroy($id);
        return response()->json(null, 204);
    }


    public function biens(){
    $biens = Biens::with(['photos', 'typeBien', 'categorieBien', 'ville', 'quartier'])->get();

    return response()->json($biens);
    }
}
