<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class HistoriquePayements extends Model

{
    protected $fillable = ['date_payement', 'payement_id', 'utilisateur_id'];

    public function payement(): BelongsTo
    {
        return $this->belongsTo(Payements::class);
    }

    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateurs::class);
    }
}
