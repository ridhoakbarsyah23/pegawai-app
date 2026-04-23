<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pegawais', function (Blueprint $table) 
        {
            $table->id();

            $table->string('nip')->unique()->nullable();
            $table->string('nama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('npwp')->nullable();
            $table->string('foto')->nullable();
            $table->string('tempat_tugas')->nullable();

            $table->foreignId('agama_id')->constrained();

            $table->foreignId('unit_kerja_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            $table->foreignId('jabatan_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            $table->foreignId('golongan_id')->constrained();

            $table->foreignId('eselon_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};