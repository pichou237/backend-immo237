<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Villes;

/**
 * @OA\Tag(
 *     name="Villes",
 *     description="Gestion des Villes"
 * )
 */

class VillesController extends Controller
{
    /** 
     * @OA\Get(path="/api/villes",
     *  tags={"Villes"}, 
     * summary="Lister villes",
     *  @OA\Response(response=200, 
     * description="OK")) 
     * */

    public function index() { 
        return Ville::all();
     }


    /**
     * @OA\Post(
     *     path="/api/villes",
     *     tags={"Villes"},
     *     summary="Créer ville",
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
         return Villes::create($r->all());
     }

    /**
     * @OA\Get(path="/api/villes/{id}", 
     * tags={"Villes"},
     * summary="Afficher ville", 
     * @OA\Parameter(name="id", in="path", required=true, 
     * @OA\Schema(type="integer")), 
     * @OA\Response(response=200, description="Détails"))
     * 
     */
    public function show($id) { 
        return Villes::findOrFail($id);
    }

    /** 
     * @OA\Put(path="/api/villes/{id}", 
     * tags={"Villes"}, 
     * summary="Modifier ville", @OA\Parameter(name="id", in="path", required=true, 
     * @OA\Schema(type="integer")),
     * @OA\RequestBody(@OA\JsonContent(), required=true), 
     * @OA\Response(response=200, description="Modifié"))
     * 
     */


    public function update(Request $r, $id) {
         $o=Villes::findOrFail($id); 
         $o->update($r->all()); 
         return $o; 
        }


    /**
     *  @OA\Delete(path="/api/villes/{id}", 
     * tags={"Villes"},
     * summary="Supprimer ville", @OA\Parameter(name="id", in="path", required=true, 
     * @OA\Schema(type="integer")),
     *  @OA\Response(response=204, description="Supprimé"))
     * 
     */


    public function destroy($id) {
        Villes::destroy($id); 
        return response()->json(null, 204); 
    }
}
