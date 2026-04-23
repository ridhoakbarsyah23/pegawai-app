<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = [
        'nip',
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'npwp',
        'foto',
        'tempat_tugas',
        'agama_id',
        'unit_kerja_id',
        'jabatan_id',
        'golongan_id',
        'eselon_id',
    ];

    // RELASI
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }


    public function agama()
    {
        return $this->belongsTo(Agama::class);
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }

    public function eselon()
    {
        return $this->belongsTo(Eselon::class);
    }

    public function unitKerja()
    {
        return $this->belongsTo(UnitKerja::class);
    }
}
