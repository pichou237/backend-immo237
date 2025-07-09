<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *   schema="Avis",
 *   type="object",
 *   required={"utilisateur_id", "commentaire", "note"},
 *   @OA\Property(property="id", type="integer"),
 *   @OA\Property(property="utilisateur_id", type="integer"),
 *   @OA\Property(property="commentaire", type="string"),
 *   @OA\Property(property="note", type="integer", format="int32"),
 *   @OA\Property(property="created_at", type="string", format="date-time"),
 *   @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */

class AvisSchema {}
