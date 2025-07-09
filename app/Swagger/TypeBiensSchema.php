<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *   schema="TypeBiens",
 *   type="object",
 *   title="TypeBiens",
 *   required={"libelle"},
 *   @OA\Property(property="id", type="integer", readOnly=true),
 *   @OA\Property(property="libelle", type="string", example="Appartement"),
 *   @OA\Property(property="created_at", type="string", format="date-time"),
 *   @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */

class TypeBiensSchema {}
