<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('servicios', function (Blueprint $table) {
            // Eliminar el campo antiguo
            $table->dropColumn('categoria_servicio');
            
            // Agregar la llave foránea
            $table->foreignId('id_categoria')
                  ->nullable()
                  ->constrained('categorias_servicios', 'id_categoria')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('servicios', function (Blueprint $table) {
            // Eliminar la relación
            $table->dropForeign(['id_categoria']);
            $table->dropColumn('id_categoria');
            
            // Recuperar el campo antiguo
            $table->string('categoria_servicio')->nullable();
        });
    }
};
