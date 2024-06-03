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
            $table->unsignedBigInteger('tipo_id');
            $table->dateTime('fecha_hora_visita')->nullable();
            $table->dateTime('fecha_hora_fin')->nullable();
            $table->dateTime('fecha_compra')->nullable();
            $table->string('metodo_pago');
            $table->float('precio');
            $table->string('observaciones')->nullable();
            $table->foreign('user_id')->references("id")->on("users");
            $table->foreign('tipo_id')->references("id")->on("tipo_entrada");
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
