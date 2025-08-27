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
        Schema::create('citas', function (Blueprint $table) {
            $table->id('id_cita');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_servicio');
            $table->unsignedBigInteger('id_empleado')->nullable();
            $table->date('fecha_cita');
            $table->time('hora_cita');
            $table->enum('estado_cita', ['pendiente', 'confirmada', 'cancelada', 'completada'])->default('pendiente');
            $table->text('observaciones')->nullable();
            
            $table->foreign('id_cliente')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
                
            $table->foreign('id_servicio')
                ->references('id_servicio')
                ->on('servicios')
                ->onDelete('cascade');
                
            $table->foreign('id_empleado')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
