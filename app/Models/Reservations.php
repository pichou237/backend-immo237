<?php

namespace App\Models;

use App\Models\Biens;
use App\Models\Payements;
use App\Models\Utilisateurs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservations extends Model
{
    protected $fillable = ['statut_reservation', 'date', 'heure', 'utilisateur_id', 'bien_id'];

    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateurs::class);
    }

    public function bien(): BelongsTo
    {
        return $this->belongsTo(Biens::class);
    }

    public function payements(): HasMany
    {
        return $this->hasMany(Payements::class);
    }
}
