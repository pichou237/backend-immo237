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
        Schema::create('historique_payements', function (Blueprint $table) {
            $table->id();
            $table->date('date_payement');
            $table->foreignId('payement_id')->constrained('payements');
            $table->foreignId('utilisateur_id')->constrained('utilisateurs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historique_payements');
    }
};
