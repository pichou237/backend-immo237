<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *   schema="HistoriquePayements",
 *   type="object",
 *   required={"payement_id", "date_paiement"},
 *   @OA\Property(property="id", type="integer"),
 *   @OA\Property(property="payement_id", type="integer"),
 *   @OA\Property(property="date_paiement", type="string", format="date"),
 *   @OA\Property(property="created_at", type="string", format="date-time"),
 *   @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */



class HistoriquePayementsSchema {}
