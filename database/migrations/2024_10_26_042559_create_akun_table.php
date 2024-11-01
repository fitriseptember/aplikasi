<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkunTable extends Migration
{
    public function up()
    {
        Schema::create('akun', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap'); // First column
            $table->string('username')->unique(); // Second column
            $table->string('password'); // Third column
            $table->string('email')->unique(); // Fourth column
            $table->string('role'); // Fifth column
            $table->string('gender'); // Sixth column
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('akun');
    }
}
