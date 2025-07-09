<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoriesBiens;

/**
 * @OA\Tag(
 *     name="CategoriesBiens",
 *     description="Gestion des CategoriesBiens immobiliers"
 * )
 */

class CategoriesBiensController extends Controller
{
    /** 
     * @OA\Get(path="/api/categorie_biens", 
     * tags={"CategorieBiens"},
     *  summary="Lister catégories",
     *  @OA\Response(response=200, description="OK")) 
     * 
    */

    public function index() {
         return CategoriesBiens::all();
         }

    /**
     * @OA\Post(
     *     path="/api/categorie_biens",
     *     tags={"CategorieBiens"},
     *     summary="Créer catégorie",
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



    public function store(Request $r) {
         return CategoriesBiens::create($r->all());
     }

    /** 
     * @OA\Get(path="/api/categorie_biens/{id}", 
     * tags={"CategorieBiens"},
     *  summary="Afficher catégorie", 
     * @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *  @OA\Response(response=200, description="Détails"))
     * 
     */


    public function show($id) { 
        return CategoriesBiens::findOrFail($id); 
    }

    /** 
     * @OA\Put(path="/api/categorie_biens/{id}",
     *  tags={"CategorieBiens"}, 
     * summary="Modifier catégorie", 
     * @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *  @OA\RequestBody(@OA\JsonContent(), required=true), 
     * @OA\Response(response=200, description="Modifié")) 
     * 
    */


    public function update(Request $r, $id) {
         $o=CategoriesBiens::findOrFail($id); 
         $o->update($r->all()); 
        return $o; 
    }

    /** 
     * @OA\Delete(path="/api/categorie_biens/{id}", 
     * tags={"CategorieBiens"},
     * summary="Supprimer catégorie",
     *  @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")), 
     * @OA\Response(response=204, description="Supprimé")) 
     * 
    */


    public function destroy($id) { 
        CategoriesBiens::destroy($id); 
        return response()->json(null, 204); 
    }
}
