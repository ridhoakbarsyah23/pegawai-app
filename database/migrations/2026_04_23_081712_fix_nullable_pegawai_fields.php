<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pegawais', function (Blueprint $table) {

            $table->string('nip')->nullable()->change();
            $table->string('nama')->nullable()->change();
            $table->string('tempat_lahir')->nullable()->change();
            $table->text('alamat')->nullable()->change();
            $table->string('no_hp')->nullable()->change();
            $table->string('npwp')->nullable()->change();
            $table->string('tempat_tugas')->nullable()->change();

            $table->unsignedBigInteger('unit_kerja_id')->nullable()->change();
            $table->unsignedBigInteger('jabatan_id')->nullable()->change();
            $table->unsignedBigInteger('eselon_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('pegawais', function (Blueprint $table) {

            $table->string('nip')->nullable(false)->change();
            $table->string('nama')->nullable(false)->change();
            $table->string('tempat_lahir')->nullable(false)->change();
            $table->text('alamat')->nullable(false)->change();
            $table->string('no_hp')->nullable(false)->change();
            $table->string('npwp')->nullable(false)->change();
            $table->string('tempat_tugas')->nullable(false)->change();

            $table->unsignedBigInteger('unit_kerja_id')->nullable(false)->change();
            $table->unsignedBigInteger('jabatan_id')->nullable(false)->change();
            $table->unsignedBigInteger('eselon_id')->nullable(false)->change();
        });
    }
};
