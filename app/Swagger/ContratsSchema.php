<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *   schema="Contrats",
 *   type="object",
 *   required={"description"},
 *   @OA\Property(property="id", type="integer"),
 *   @OA\Property(property="description", type="string"),
 *   @OA\Property(property="created_at", type="string", format="date-time"),
 *   @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */

class ContratsSchema {}
