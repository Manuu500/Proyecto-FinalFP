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
        Schema::create('exposicion_obra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_expo');
            $table->unsignedBigInteger('id_obra');
            $table->foreign('id_expo')->references('id')->on('exposicion')->onDelete('cascade');
            $table->foreign('id_obra')->references('id')->on('obra')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exposicion_obra');
    }
};
