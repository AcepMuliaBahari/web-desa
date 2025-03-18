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
        Schema::create('village_regulations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['produk_hukum', 'informasi_publik']);
            $table->enum('category', [
                'perdes', // Peraturan Desa
                'perkades', // Peraturan Kepala Desa
                'sk_kades', // Surat Keputusan Kepala Desa
                'apbdes', // Anggaran Pendapatan dan Belanja Desa
                'lainnya' // Kategori Lainnya
            ]);
            $table->string('number')->nullable(); // Nomor peraturan/dokumen
            $table->date('date_enacted');
            $table->string('file_path')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('village_regulations');
    }
};
