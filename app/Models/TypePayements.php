<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TypePayements extends Model
{
    protected $fillable = ['mode'];

    public function payements(): HasMany
    {
        return $this->hasMany(Payements::class);
    }
}
