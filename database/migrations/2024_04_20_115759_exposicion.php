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
        Schema::create('exposicion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_entrada')->nullable();
            $table->foreign('id_entrada')->references('id')->on('entrada')->onDelete("set null");
            $table->string('organizador');
            $table->integer('aforo');
            $table->dateTime('fecha_inicio');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exposicion');
    }
};
