<?php

namespace App\Models;

use App\Models\Reservations;
use App\Models\TypePayements;
use App\Models\HistoriquePayements;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payements extends Model
{
protected $fillable = ['montant', 'statut', 'reservation_id', 'type_payement_id'];

    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservations::class);
    }

    public function typePayement(): BelongsTo
    {
        return $this->belongsTo(TypePayements::class);
    }

    public function historiquePayements(): HasMany
    {
        return $this->hasMany(HistoriquePayements::class ,'payement_id');
    }
}
