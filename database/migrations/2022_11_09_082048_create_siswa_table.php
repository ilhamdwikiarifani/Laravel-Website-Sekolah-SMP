<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('foto');
            $table->string('nisn');
            $table->string('nik');
            $table->string('jeniskelamin');
            $table->text('tempat');
            $table->dateTime('tanggallahir');
            $table->text('alamat');
            $table->string('userbelajarid')->nullable();
            $table->string('passwordbelajarid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
