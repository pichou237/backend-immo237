<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Avis extends Model
{
    protected $fillable = ['commentaire', 'note', 'date', 'utilisateur_id', 'bien_id'];

    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateurs::class);
    }

    public function bien(): BelongsTo
    {
        return $this->belongsTo(Biens::class);
    }
}
