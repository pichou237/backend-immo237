<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoriesBiens extends Model
{
    protected $fillable = ['libelle'];

    public function biens(): HasMany
    {
        return $this->hasMany(Biens::class ,"categorie_bien_id");
    }
}
