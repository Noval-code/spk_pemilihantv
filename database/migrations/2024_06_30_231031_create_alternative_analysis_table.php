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
        Schema::create('alternative_analysis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_criteria');
            $table->unsignedBigInteger('id_alternative');
            $table->float('weight')->nullable();
            $table->timestamps();

            $table->foreign('id_criteria')->references('id')->on('criterias')->onDelete('cascade');
            $table->foreign('id_alternative')->references('id')->on('alternatives')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternative_analysis');
    }
};
