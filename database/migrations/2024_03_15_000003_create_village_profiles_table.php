<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('village_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('village_name');
            $table->string('village_head');
            $table->text('address');
            $table->string('phone');
            $table->string('email');
            $table->text('vision');
            $table->text('mission');
            $table->text('description');
            $table->string('logo')->nullable();
            $table->text('history');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('village_profiles');
    }
}; 