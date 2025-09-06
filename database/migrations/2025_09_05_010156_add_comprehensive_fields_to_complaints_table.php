<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->string('reporter_name')->after('title');
            $table->string('nik')->after('reporter_name');
            $table->string('address')->after('nik');
            $table->string('phone')->nullable()->after('address');
            $table->string('complaint_type')->after('phone');
            $table->string('incident_location')->after('complaint_type');
            $table->datetime('incident_time')->nullable()->after('incident_location');
            $table->string('evidence_file_path')->nullable()->after('incident_time');
            $table->string('document_file_path')->nullable()->after('evidence_file_path');
        });
    }

    public function down(): void
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->dropColumn([
                'reporter_name', 'nik', 'address', 'phone', 
                'complaint_type', 'incident_location', 'incident_time', 
                'evidence_file_path', 'document_file_path'
            ]);
        });
    }
};
