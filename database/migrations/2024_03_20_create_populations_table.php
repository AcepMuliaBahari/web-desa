<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('populations', function (Blueprint $table) {
            $table->id();
            $table->integer('laki_laki')->default(0);
            $table->integer('perempuan')->default(0);
            $table->integer('usia_0_14')->default(0);
            $table->integer('usia_15_64')->default(0);
            $table->integer('usia_65_plus')->default(0);
            $table->integer('pendidikan_sd')->default(0);
            $table->integer('pendidikan_smp')->default(0);
            $table->integer('pendidikan_sma')->default(0);
            $table->integer('pendidikan_pt')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('populations');
    }
};