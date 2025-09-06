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
        Schema::table('complaints', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['citizen_id']);
            // Make citizen_id nullable
            $table->string('citizen_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('complaints', function (Blueprint $table) {
            // Make citizen_id not nullable again
            $table->string('citizen_id')->nullable(false)->change();
            // Add back the foreign key constraint
            $table->foreign('citizen_id')->references('id')->on('citizens')->onDelete('cascade');
        });
    }
};
