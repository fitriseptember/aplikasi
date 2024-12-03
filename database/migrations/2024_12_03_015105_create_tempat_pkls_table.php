<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('tempat_pkl', function (Blueprint $table) {
        $table->id();
        $table->string('pkl_place');
        $table->string('pkl_address');
        $table->string('pkl_teacher');
        $table->string('pkl_mentor');
        $table->string('pkl_student');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('tempat_pkls');
    }
};