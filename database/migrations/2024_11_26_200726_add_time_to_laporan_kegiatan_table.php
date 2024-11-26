<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Migration file
public function up()
{
    Schema::table('laporan_kegiatan', function (Blueprint $table) {
        $table->time('time')->nullable();
    });
}

public function down()
{
    Schema::table('laporan_kegiatan', function (Blueprint $table) {
        $table->dropColumn('time');
    });
}




};
