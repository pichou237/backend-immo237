<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TypeUtilisateurs extends Model
{
    protected $fillable = ['type_u'];

    public function utilisateurs(): HasMany
    {
        return $this->hasMany(Utilisateurs::class);
    }
}
