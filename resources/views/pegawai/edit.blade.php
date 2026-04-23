@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto px-4 py-6">

        <div class="bg-white shadow-lg rounded-2xl p-6">

            <h2 class="text-2xl font-bold text-gray-700 mb-6">
                Edit Pegawai
            </h2>

            <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    {{-- NIP --}}
                    <div>
                        <label class="text-sm text-gray-600">NIP</label>
                        <input type="text" name="nip" value="{{ $pegawai->nip }}"
                            class="w-full mt-1 px-3 py-2 border rounded-lg">
                    </div>

                    {{-- Nama --}}
                    <div>
                        <label class="text-sm text-gray-600">Nama</label>
                        <input type="text" name="nama" value="{{ $pegawai->nama }}"
                            class="w-full mt-1 px-3 py-2 border rounded-lg">
                    </div>

                    {{-- Tempat Lahir --}}
                    <div>
                        <label class="text-sm text-gray-600">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ $pegawai->tempat_lahir }}"
                            class="w-full mt-1 px-3 py-2 border rounded-lg">
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div>
                        <label class="text-sm text-gray-600">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" value="{{ $pegawai->tgl_lahir }}"
                            class="w-full mt-1 px-3 py-2 border rounded-lg">
                    </div>

                    {{-- Alamat --}}
                    <div class="md:col-span-2">
                        <label class="text-sm text-gray-600">Alamat</label>
                        <textarea name="alamat" class="w-full mt-1 px-3 py-2 border rounded-lg">{{ $pegawai->alamat }}</textarea>
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div>
                        <label class="text-sm text-gray-600">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="w-full mt-1 px-3 py-2 border rounded-lg">
                            <option value="L" {{ $pegawai->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $pegawai->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    {{-- No HP --}}
                    <div>
                        <label class="text-sm text-gray-600">No HP</label>
                        <input type="text" name="no_hp" value="{{ $pegawai->no_hp }}"
                            class="w-full mt-1 px-3 py-2 border rounded-lg">
                    </div>

                    {{-- NPWP --}}
                    <div>
                        <label class="text-sm text-gray-600">NPWP</label>
                        <input type="text" name="npwp" value="{{ $pegawai->npwp }}"
                            class="w-full mt-1 px-3 py-2 border rounded-lg">
                    </div>

                    {{-- Tempat Tugas --}}
                    <div>
                        <label class="text-sm text-gray-600">Tempat Tugas</label>
                        <input type="text" name="tempat_tugas" value="{{ $pegawai->tempat_tugas }}"
                            class="w-full mt-1 px-3 py-2 border rounded-lg">
                    </div>

                    {{-- Jabatan --}}
                    <div>
                        <label class="text-sm text-gray-600">Jabatan</label>
                        <input type="text" name="jabatan" value="{{ $pegawai->jabatan->nama ?? '' }}"
                            class="w-full mt-1 px-3 py-2 border rounded-lg">
                    </div>

                    {{-- Golongan --}}
                    <div>
                        <label class="text-sm text-gray-600">Golongan</label>
                        <input type="text" name="golongan" value="{{ $pegawai->golongan->golongan ?? '' }}"
                            class="w-full mt-1 px-3 py-2 border rounded-lg">
                    </div>

                    {{-- Eselon --}}
                    <div>
                        <label class="text-sm text-gray-600">Eselon</label>
                        <input type="text" name="eselon" value="{{ $pegawai->eselon->nama_eselon ?? '' }}"
                            class="w-full mt-1 px-3 py-2 border rounded-lg">
                    </div>

                    {{-- Agama --}}
                    <div>
                        <label class="text-sm text-gray-600">Agama</label>
                        <input type="text" name="agama" value="{{ $pegawai->agama->nama ?? '' }}"
                            class="w-full mt-1 px-3 py-2 border rounded-lg">
                    </div>

                    {{-- Unit Kerja --}}
                    <div>
                        <label class="text-sm text-gray-600">Unit Kerja</label>
                        <input type="text" name="unit_kerja" value="{{ $pegawai->unitKerja->nama_unit ?? '' }}"
                            class="w-full mt-1 px-3 py-2 border rounded-lg">
                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="mt-6 flex justify-end gap-2">
                    <a href="{{ route('pegawai.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded-lg">
                        Kembali
                    </a>

                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Update
                    </button>
                </div>

            </form>

        </div>

    </div>
@endsection
