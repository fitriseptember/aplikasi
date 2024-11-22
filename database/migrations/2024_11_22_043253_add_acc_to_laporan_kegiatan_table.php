<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAccToLaporanKegiatanTable extends Migration
{
    public function up()
    {
        Schema::table('laporan_kegiatan', function (Blueprint $table) {
            $table->boolean('acc')->default(false); // Kolom ACC default false
        });
    }

    public function down()
    {
        Schema::table('laporan_kegiatan', function (Blueprint $table) {
            $table->dropColumn('acc');
        });
    }
}
