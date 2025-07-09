<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *   schema="CategorieBiens",
 *   type="object",
 *   required={"libelle"},
 *   @OA\Property(property="id", type="integer"),
 *   @OA\Property(property="libelle", type="string", example="Meublé"),
 *   @OA\Property(property="type_bien_id", type="integer"),
 *   @OA\Property(property="created_at", type="string", format="date-time"),
 *   @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */

class CategoriesBiensSchema {}
