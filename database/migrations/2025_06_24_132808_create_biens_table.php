<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('biens', function (Blueprint $table) {
            $table->id();
            $table->string('description', 500);
            $table->integer('surface');
            $table->integer('nbre_chambre');
            $table->integer('nbre_douche');
            $table->integer('nbre_cuisine');
            $table->integer('prix');
            $table->string('statut', 100);
            $table->date('date_publication');
            $table->foreignId('type_bien_id')->constrained('type_biens');
            $table->foreignId('categorie_bien_id')->constrained('categories_biens');
            $table->foreignId('ville_id')->constrained('villes');
            $table->foreignId('quartier_id')->constrained('quartiers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biens');
    }
};
