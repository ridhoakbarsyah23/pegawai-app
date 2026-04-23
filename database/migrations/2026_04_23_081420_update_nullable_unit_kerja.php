<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pegawais', function (Blueprint $table) {
            $table->unsignedBigInteger('unit_kerja_id')->nullable()->change();
            $table->unsignedBigInteger('jabatan_id')->nullable()->change();
            $table->unsignedBigInteger('eselon_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('pegawais', function (Blueprint $table) {
            $table->unsignedBigInteger('unit_kerja_id')->nullable(false)->change();
            $table->unsignedBigInteger('jabatan_id')->nullable(false)->change();
            $table->unsignedBigInteger('eselon_id')->nullable(false)->change();
        });
    }
};
