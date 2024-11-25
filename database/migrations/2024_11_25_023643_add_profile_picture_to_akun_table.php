<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfilePictureToAkunTable extends Migration
{
  public function up()
{
    Schema::table('akun', function (Blueprint $table) {
        $table->string('profile_picture')->nullable();
    });
}

public function down()
{
    Schema::table('akun', function (Blueprint $table) {
        $table->dropColumn('profile_picture');
    });
}

}
