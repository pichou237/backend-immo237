<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *   schema="Utilisateurs",
 *   type="object",
 *   required={"nom", "prenom", "email", "mot_de_passe", "type_utilisateur_id"},
 *   @OA\Property(property="id", type="integer"),
 *   @OA\Property(property="nom", type="string"),
 *   @OA\Property(property="prenom", type="string"),
 *   @OA\Property(property="email", type="string"),
 *   @OA\Property(property="mot_de_passe", type="string"),
 *   @OA\Property(property="type_utilisateur_id", type="integer"),
 *   @OA\Property(property="created_at", type="string", format="date-time"),
 *   @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */

class UtilisateursSchema {}
