<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Ajouter les colonnes nécessaires
            $table->string('adresse')->nullable(); // Adresse du client
            $table->string('ville')->nullable(); // Ville du client
            $table->string('code_postale')->nullable(); // Code postal du client
            $table->string('telephone')->nullable(); // Téléphone du client
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Supprimer les colonnes ajoutées
            $table->dropColumn('adresse');
            $table->dropColumn('ville');
            $table->dropColumn('code_postale');
            $table->dropColumn('telephone');
        });
    }
};