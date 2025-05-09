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
        Schema::create('ubs_units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wing_id');
            $table->index('wing_id');
            $table->foreign('wing_id')->references('id')->on('ubs_wings')->onDelete('cascade')->nullable();
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ubs_units');
    }
};
