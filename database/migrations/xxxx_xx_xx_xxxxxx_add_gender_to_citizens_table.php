<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGenderToCitizensTable extends Migration
{
    public function up()
    {
        Schema::table('citizens', function (Blueprint $table) {
            $table->string('gender')->nullable();
        });
    }

    public function down()
    {
        Schema::table('citizens', function (Blueprint $table) {
            $table->dropColumn('gender');
        });
    }
} 