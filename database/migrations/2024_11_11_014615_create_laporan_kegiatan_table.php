<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('laporan_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->text('deskripsi');
            $table->string('foto_kegiatan');
              $table->string('tempat_pkl');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan_kegiatan');
    }
};
