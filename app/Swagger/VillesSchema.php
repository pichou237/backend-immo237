<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *   schema="Villes",
 *   type="object",
 *   required={"nom"},
 *   @OA\Property(property="id", type="integer"),
 *   @OA\Property(property="nom", type="string", example="Douala"),
 *   @OA\Property(property="created_at", type="string", format="date-time"),
 *   @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */

class VillesSchema {}
