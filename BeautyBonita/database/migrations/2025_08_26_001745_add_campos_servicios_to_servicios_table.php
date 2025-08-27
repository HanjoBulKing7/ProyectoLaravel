<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('servicios', function (Blueprint $table) {
            // Campo para la imagen (ya lo teníamos)
            $table->string('imagen')->nullable()->after('estado');
            
            // Nuevos campos adicionales
            $table->string('categoria_servicio')->nullable()->after('imagen');
            $table->decimal('descuento', 5, 2)->nullable()->after('categoria_servicio');
            $table->text('caracteristicas')->nullable()->after('descuento');
        });
    }

    public function down()
    {
        Schema::table('servicios', function (Blueprint $table) {
            $table->dropColumn(['imagen', 'categoria_servicio', 'descuento', 'caracteristicas']);
        });
    }
};