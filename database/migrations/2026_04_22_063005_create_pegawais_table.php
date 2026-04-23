<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawais', function (Blueprint $table) 
        {
            $table->id();
            $table->string('nip')->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat');
            $table->string('no_hp')->nullable();
            $table->string('npwp')->nullable();
            $table->string('foto')->nullable();
            $table->string('tempat_tugas')->nullable();

            $table->foreignId('agama_id')->constrained();
            $table->foreignId('unit_kerja_id')->constrained();
            $table->foreignId('jabatan_id')->constrained();
            $table->foreignId('golongan_id')->constrained();
            $table->foreignId('eselon_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
