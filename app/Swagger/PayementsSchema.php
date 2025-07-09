<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *   schema="Payements",
 *   type="object",
 *   required={"montant", "type_payement_id", "reservation_id"},
 *   @OA\Property(property="id", type="integer"),
 *   @OA\Property(property="montant", type="number", format="float"),
 *   @OA\Property(property="type_payement_id", type="integer"),
 *   @OA\Property(property="reservation_id", type="integer"),
 *   @OA\Property(property="created_at", type="string", format="date-time"),
 *   @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */


class PayementsSchema {}
