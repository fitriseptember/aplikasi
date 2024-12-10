<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPartnerAndTeacherToAkunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('akun', function (Blueprint $table) {
            $table->string('partner')->nullable(); // Tambahkan kolom 'partner' dengan tipe string
            $table->string('teacher')->nullable(); // Tambahkan kolom 'teacher' dengan tipe string
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('akun', function (Blueprint $table) {
            $table->dropColumn('partner');
            $table->dropColumn('teacher');
        });
    }
}
