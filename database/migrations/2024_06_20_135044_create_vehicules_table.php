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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('modele');
            $table->string('marque');
            $table->string('type');
            $table->string('couleur');
            $table->integer('prix');
            $table->string('document');
            $table->string('visuel');
            $table->string('annee');
            $table->timestamps();
        });
        Schema::create('client_vehicule', function (Blueprint $table){
            $table->foreignIdFor(\App\Models\client::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\vehicule::class)->constrained()->cascadeOnDelete();
            $table->date('date_d');
            $table->date('date_f');
            $table->integer('montant');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
