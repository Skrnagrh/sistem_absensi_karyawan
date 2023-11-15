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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nip')->unique();
            $table->string('name');
            $table->string('jabatan')->nullable();
            $table->string('posisi')->nullable();
            $table->string('idcard')->nullable();
            $table->string('tempat')->nullable();
            $table->string('tgllahir')->nullable();
            $table->string('jenkel')->nullable();
            $table->string('agama')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('nohp')->nullable();
            $table->string('lulus')->nullable();
            $table->string('status')->nullable();
            $table->string('alamat')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('karyawans');
    }
};
