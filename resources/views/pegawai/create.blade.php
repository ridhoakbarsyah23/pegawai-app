@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-6">

    <div class="bg-white rounded-2xl shadow-lg p-8">

        <h2 class="text-2xl font-bold text-gray-700 mb-6">
            Tambah Pegawai
        </h2>

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            {{-- DATA PRIBADI --}}
            <div>
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Data Pribadi</h3>

                <div class="grid md:grid-cols-2 gap-5">

                    <div>
                        <label>NIP</label>
                        <input name="nip" value="{{ old('nip') }}"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label>Nama</label>
                        <input name="nama" value="{{ old('nama') }}"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label>Tempat Lahir</label>
                        <input name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label>Tanggal Lahir <span class="text-red-500">*</span></label>
                        <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required
                            class="w-full border rounded-lg px-3 py-2">
                    </div>

                </div>
            </div>

            {{-- JENIS KELAMIN --}}
            <div>
                <label>Jenis Kelamin <span class="text-red-500">*</span></label>
                <div class="flex gap-5 mt-2">
                    @foreach ($jenisKelamin as $key => $label)
                        <label class="flex items-center gap-2">
                            <input type="radio" name="jenis_kelamin" value="{{ $key }}" required
                                {{ old('jenis_kelamin') == $key ? 'checked' : '' }}>
                            {{ $label }}
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- ALAMAT --}}
            <div>
                <label>Alamat</label>
                <textarea name="alamat" rows="3" class="w-full border rounded-lg px-3 py-2">{{ old('alamat') }}</textarea>
            </div>

            {{-- DATA PEGAWAI --}}
            <div>
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Data Kepegawaian</h3>

                <div class="grid md:grid-cols-2 gap-5">

                    <div>
                        <label>Tempat Tugas</label>
                        <input name="tempat_tugas" value="{{ old('tempat_tugas') }}"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label>Agama <span class="text-red-500">*</span></label>
                        <select name="agama_id" required class="w-full border rounded-lg px-3 py-2">
                            <option value="">-- Pilih --</option>
                            @foreach ($agama as $a)
                                <option value="{{ $a->id }}" {{ old('agama_id') == $a->id ? 'selected' : '' }}>
                                    {{ $a->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label>Unit Kerja</label>
                        <select name="unit_kerja_id" class="w-full border rounded-lg px-3 py-2">
                            <option value="">-- Pilih --</option>
                            @foreach ($unitKerja as $u)
                                <option value="{{ $u->id }}" {{ old('unit_kerja_id') == $u->id ? 'selected' : '' }}>
                                    {{ $u->nama_unit }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label>Jabatan</label>
                        <select name="jabatan_id" class="w-full border rounded-lg px-3 py-2">
                            <option value="">-- Pilih --</option>
                            @foreach ($jabatan as $j)
                                <option value="{{ $j->id }}" {{ old('jabatan_id') == $j->id ? 'selected' : '' }}>
                                    {{ $j->nama }}
                                    {{ $j->level ? '(' . ucfirst($j->level) . ')' : '' }}
                                    {{ $j->eselon ? '(Eselon ' . $j->eselon . ')' : '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label>Golongan <span class="text-red-500">*</span></label>
                        <select name="golongan_id" required class="w-full border rounded-lg px-3 py-2">
                            @foreach ($golongan as $g)
                                <option value="{{ $g->id }}" {{ old('golongan_id') == $g->id ? 'selected' : '' }}>
                                    {{ $g->golongan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label>Eselon</label>
                        <select name="eselon_id" class="w-full border rounded-lg px-3 py-2">
                            <option value="">-- Pilih --</option>
                            @foreach ($eselon as $e)
                                <option value="{{ $e->id }}" {{ old('eselon_id') == $e->id ? 'selected' : '' }}>
                                    {{ $e->nama_eselon }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>

            {{-- KONTAK --}}
            <div>
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Kontak</h3>

                <div class="grid md:grid-cols-2 gap-5">
                    <div>
                        <label>No HP</label>
                        <input name="no_hp" value="{{ old('no_hp') }}"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label>NPWP</label>
                        <input name="npwp" value="{{ old('npwp') }}"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>
                </div>
            </div>

            {{-- FOTO --}}
            <div>
                <label>Foto</label>
                <input type="file" name="foto" id="fotoInput" accept="image/*"
                    class="w-full border rounded-lg px-3 py-2 bg-gray-50">

                <div class="mt-3">
                    <img id="previewFoto" class="hidden w-32 h-32 object-cover rounded-lg border">
                </div>
            </div>

            {{-- BUTTON --}}
            <div class="flex justify-end gap-3 pt-6 border-t">
                <a href="{{ route('pegawai.index') }}" class="px-5 py-2 bg-gray-500 text-white rounded-lg">
                    Kembali
                </a>

                <button class="px-5 py-2 bg-blue-600 text-white rounded-lg">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>

<script>
document.getElementById('fotoInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewFoto');

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        }

        reader.readAsDataURL(file);
    } else {
        preview.src = "";
        preview.classList.add('hidden');
    }
});
</script>

@endsection
