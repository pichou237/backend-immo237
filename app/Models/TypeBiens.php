<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TypeBiens extends Model
{
    protected $fillable = ['type'];

    public function biens(): HasMany
    {
        return $this->hasMany(Biens::class);
    }
}
