<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contrats extends Model
{
    protected $fillable = ['description', 'date_debut', 'date_fin', 'utilisateur_id', 'bien_id'];

    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateurs::class);
    }

    public function bien(): BelongsTo
    {
        return $this->belongsTo(Biens::class);
    }
}