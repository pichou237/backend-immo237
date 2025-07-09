<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quartiers extends Model
{
    protected $fillable = ['nom_quartier', 'ville_id'];

    public function ville(): BelongsTo
    {
        return $this->belongsTo(Villes::class);
    }

    public function biens(): HasMany
    {
        return $this->hasMany(Biens::class);
    }
}
