<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Utilisateurs extends Model
{
    protected $fillable = ['nom_u', 'prenom_u', 'email_u', 'numero_u', 'mot_passe_u', 'type_utilisateur_id'];

    public function typeUtilisateur(): BelongsTo
    {
        return $this->belongsTo(TypeUtilisateurs::class);
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservations::class);
    }

    public function contrats(): HasMany
    {
        return $this->hasMany(Contrats::class);
    }

    public function avis(): HasMany
    {
        return $this->hasMany(Avis::class);
    }

    public function historiquePayements(): HasMany
    {
        return $this->hasMany(HistoriquePayements::class);
    }
}