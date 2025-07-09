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
        Schema::create('avis', function (Blueprint $table) {
           $table->id();
            $table->text('commentaire');
            $table->integer('note');
            $table->date('date');
            $table->foreignId('utilisateur_id')->constrained('utilisateurs');
            $table->foreignId('bien_id')->constrained('biens');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};
