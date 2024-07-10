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
        Schema::create('criterias_analysis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_criteria1')->constrained('criterias');
            $table->foreignId('id_criteria2')->constrained('criterias');
            $table->decimal('value', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criterias_analysis');
    }
};
