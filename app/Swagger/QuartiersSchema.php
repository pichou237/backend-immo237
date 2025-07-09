<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *   schema="Quartiers",
 *   type="object",
 *   required={"nom", "ville_id"},
 *   @OA\Property(property="id", type="integer"),
 *   @OA\Property(property="nom", type="string", example="Bonapriso"),
 *   @OA\Property(property="ville_id", type="integer"),
 *   @OA\Property(property="created_at", type="string", format="date-time"),
 *   @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */

class QuartiersSchema {}
