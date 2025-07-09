<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Villes extends Model
{
    protected $fillable = ['nom_ville'];

    public function quartiers(): HasMany
    {
        return $this->hasMany(Quartiers::class);
    }

    public function biens(): HasMany
    {
        return $this->hasMany(Biens::class ,'ville_id');
    }
}
