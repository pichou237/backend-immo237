<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *   schema="Photos",
 *   type="object",
 *   required={"url"},
 *   @OA\Property(property="id", type="integer"),
 *   @OA\Property(property="url", type="string"),
 *   @OA\Property(property="bien_id", type="integer"),
 *   @OA\Property(property="created_at", type="string", format="date-time"),
 *   @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */

class PhotosSchema {}
