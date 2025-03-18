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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('role')->nullable(); // Jabatan (jika menyimpan data anggota)
            $table->string('photo')->nullable(); // Foto profil atau logo organisasi
            $table->text('description')->nullable(); // Deskripsi tentang organisasi
            $table->string('contact_phone')->nullable(); // Nomor telepon organisasi atau anggota
            $table->string('contact_email')->nullable(); // Tambah email
            $table->integer('order')->nullable(); // Urutan dalam struktur
            $table->boolean('is_active')->default(true); // Status aktif/tidak
            $table->integer('parent_id')->nullable(); // Untuk struktur hierarki
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
