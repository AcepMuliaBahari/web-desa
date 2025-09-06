<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->string('title')->after('citizen_id');
            $table->date('incident_date')->nullable()->after('content');
            $table->string('incident_place')->nullable()->after('incident_date');
            $table->string('file_path')->nullable()->after('category');
        });
    }

    public function down(): void
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->dropColumn(['title', 'incident_date', 'incident_place', 'file_path']);
        });
    }
};
