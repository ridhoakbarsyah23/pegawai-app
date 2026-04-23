<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pegawais', function (Blueprint $table) {

            // hapus kolom lama kalau ada
            if (Schema::hasColumn('pegawais', 'jabatan')) {
                $table->dropColumn('jabatan');
            }

            // tambah relasi baru
            if (!Schema::hasColumn('pegawais', 'jabatan_id')) {
                $table->foreignId('jabatan_id')
                    ->after('nama')
                    ->constrained()
                    ->cascadeOnDelete();
            }
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pegawais', function (Blueprint $table) {

            // hapus foreign key dulu
            if (Schema::hasColumn('pegawais', 'jabatan_id')) {
                $table->dropForeign(['jabatan_id']);
                $table->dropColumn('jabatan_id');
            }

            // balikin kolom lama
            if (!Schema::hasColumn('pegawais', 'jabatan')) {
                $table->string('jabatan')->nullable();
            }
        });
    }
};
