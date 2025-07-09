<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photos extends Model
{
    protected $fillable = ['url_photo', 'bien_id'];

    public function bien(): BelongsTo
    {
        return $this->belongsTo(Biens::class);
    }
}