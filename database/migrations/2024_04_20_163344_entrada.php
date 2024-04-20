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
        Schema::create('entrada', function (Blueprint $table) {
            $table->id();
            $table->string('num_entrada');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('expo_id');
            $table->string('tipo');
            $table->dateTime('fecha_hora_visita')->nullable();
            $table->dateTime('fecha_hora_fin')->nullable();
            $table->dateTime('fecha_compra')->nullable();
            $table->string('metodo_pago');
            $table->string('observaciones')->nullable();
            $table->foreign('user_id')->references("id")->on("users");
            $table->foreign('expo_id')->references("id")->on("exposicion");
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrada');
    }
};
