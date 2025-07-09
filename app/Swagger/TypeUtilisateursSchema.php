<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *   schema="TypeUtilisateurs",
 *   type="object",
 *   required={"libelle"},
 *   @OA\Property(property="id", type="integer"),
 *   @OA\Property(property="libelle", type="string", example="Propriétaire"),
 *   @OA\Property(property="created_at", type="string", format="date-time"),
 *   @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */

class TypeUtilisateursSchema {}
