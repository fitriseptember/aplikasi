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
            $table->string('role');
            $table->string('gender');
            $table->string('nama_lengkap');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('akun');
    }
}
