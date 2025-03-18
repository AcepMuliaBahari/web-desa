<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('apbdes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pendapatan')->default(0);
            $table->bigInteger('dana_desa')->default(0);
            $table->bigInteger('pad')->default(0);
            $table->bigInteger('bantuan')->default(0);
            $table->bigInteger('belanja')->default(0);
            $table->bigInteger('belanja_pembangunan')->default(0);
            $table->bigInteger('belanja_operasional')->default(0);
            $table->bigInteger('belanja_takterduga')->default(0);
            $table->string('dokumen_url')->nullable();
            $table->year('tahun');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('apbdes');
    }
};