<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('idms', function (Blueprint $table) {
            $table->id();
            $table->decimal('skor', 8, 4);
            $table->enum('status', ['Mandiri', 'Berkembang', 'Tertinggal', 'Sangat Tertinggal']);
            $table->decimal('sosial', 5, 2);
            $table->decimal('ekonomi', 5, 2);
            $table->decimal('lingkungan', 5, 2);
            $table->year('tahun');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('idms');
    }
};