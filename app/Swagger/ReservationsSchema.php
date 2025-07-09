<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *   schema="Reservations",
 *   type="object",
 *   required={"utilisateur_id", "contrat_id", "date_debut", "date_fin"},
 *   @OA\Property(property="id", type="integer"),
 *   @OA\Property(property="utilisateur_id", type="integer"),
 *   @OA\Property(property="contrat_id", type="integer"),
 *   @OA\Property(property="date_debut", type="string", format="date"),
 *   @OA\Property(property="date_fin", type="string", format="date"),
 *   @OA\Property(property="created_at", type="string", format="date-time"),
 *   @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */

class ReservationsSchema {}
