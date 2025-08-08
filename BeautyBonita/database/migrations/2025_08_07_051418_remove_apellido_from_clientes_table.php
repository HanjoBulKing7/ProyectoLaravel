<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn('apellido');
        });
    }

    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->string('apellido')->after('nombre');
        });
    }
};