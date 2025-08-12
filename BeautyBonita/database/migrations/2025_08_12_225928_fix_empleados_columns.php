<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            // Si existe 'celular', lo renombramos a 'telefono'
            if (Schema::hasColumn('empleados', 'celular') && !Schema::hasColumn('empleados', 'telefono')) {
                $table->renameColumn('celular', 'telefono');
            }

            // Si no existe 'telefono', lo creamos
            if (!Schema::hasColumn('empleados', 'telefono')) {
                $table->string('telefono')->nullable()->after('nombre');
            }

            // Si no existe 'email', lo creamos
            if (!Schema::hasColumn('empleados', 'email')) {
                $table->string('email')->nullable()->unique()->after('telefono');
            }
        });
    }

    public function down(): void
    {
        // No revertimos nada
    }
};

