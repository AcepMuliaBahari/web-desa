<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('developments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('photo')->nullable();
            $table->decimal('budget', 15, 2);
            $table->integer('progress')->default(0);
            $table->enum('status', ['Belum Dimulai', 'Proses', 'Selesai', 'Tertunda'])->default('Belum Dimulai');
            $table->string('location');
            $table->string('pic_name');
            $table->string('pic_contact');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('developments');
    }
};