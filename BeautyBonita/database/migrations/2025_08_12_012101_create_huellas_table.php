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
        Schema::create('huellas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('empleado_id')->constrained('empleados')->onDelete('cascade');
        $table->string('formato')->default('DP/ANSI');
        $table->longText('fmd_xml');
        $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('huellas');
    }
};
