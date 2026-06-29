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
            Schema::create('produits', function (Blueprint $table) {
            $table->string('ref_prod');
            $table->string('nom_prod');
            $table->decimal('prix_prod',6,2);
            $table->integer('qtt_prod');
            $table->string('desc_prod')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
