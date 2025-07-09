<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Biens extends Model
{
    protected $fillable = [
        'description', 'surface', 'nbre_chambre', 'nbre_douche', 'nbre_cuisine',
        'prix', 'statut', 'date_publication', 'type_bien_id', 'categorie_bien_id',
        'ville_id', 'quartier_id'
    ];

    public function typeBien(): BelongsTo
    {
        return $this->belongsTo(TypeBiens::class);
    }

    public function categorieBien(): BelongsTo
    {
        return $this->belongsTo(CategoriesBiens::class);
    }

    public function ville(): BelongsTo
    {
        return $this->belongsTo(Villes::class, 'ville_id');
    }

    public function quartier(): BelongsTo
    {
        return $this->belongsTo(Quartiers::class, 'quartier_id');
    }

    public function photos(): HasMany
    {
        return $this->hasMany(Photos::class ,"bien_id");
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservations::class, 'bien_id');
    }

    public function contrats(): HasMany
    {
        return $this->hasMany(Contrats::class, 'bien_id');
    }

    public function avis(): HasMany
    {
        return $this->hasMany(Avis::class);
    }
}
