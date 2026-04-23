@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">

    <div class="bg-white rounded-2xl shadow-xl p-6">

        {{-- HEADER --}}
        <div class="flex flex-col items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Pegawai</h1>
            <p class="text-sm text-gray-500">PT. TRASPAC Makmur Sejahtera</p>
        </div>

        {{-- FILTER + ACTION --}}
        <div class="flex flex-col md:flex-row md:justify-between gap-3 mb-5">

            {{-- BUTTON --}}
            <div class="flex gap-2">
                <a href="{{ route('pegawai.create') }}"
                    class="bg-green-600 text-white px-4 py-2 rounded-xl text-sm shadow hover:bg-green-700">
                    ➕ Tambah
                </a>

                <a href="{{ route('pegawai.cetak') }}" target="_blank"
                    class="bg-gray-700 text-white px-4 py-2 rounded-xl text-sm shadow hover:bg-gray-800">
                    🖨 Cetak
                </a>
            </div>

            {{-- FILTER FORM --}}
            <form class="flex flex-col md:flex-row gap-2 items-center">

                {{-- SEARCH DATA --}}
                <input type="text" name="search"
                    placeholder="Cari nama / NIP..."
                    value="{{ request('search') }}"
                    class="bg-gray-100 rounded-xl px-3 py-2 text-sm outline-none w-48 md:w-64">

                {{-- FILTER UNIT KERJA --}}
                <select name="unit_kerja_id"
                    class="bg-gray-100 rounded-xl px-3 py-2 text-sm outline-none">

                    <option value="">Semua Unit</option>

                    @foreach($unitKerja as $unit)
                        <option value="{{ $unit->id }}"
                            {{ request('unit_kerja_id') == $unit->id ? 'selected' : '' }}>
                            {{ $unit->nama_unit }}
                        </option>
                    @endforeach
                </select>

                <button class="bg-blue-600 text-white px-4 py-2 rounded-xl text-sm">
                    Filter
                </button>

                {{-- RESET --}}
                <a href="{{ route('pegawai.index') }}"
                    class="text-sm text-gray-500 underline">
                    Reset
                </a>

            </form>
        </div>

        {{-- INFO FILTER DATA --}}
        @if(request('unit_kerja_id'))
            <div class="mb-3 text-sm text-gray-500">
                Menampilkan unit:
                <b>
                    {{ $unitKerja->where('id', request('unit_kerja_id'))->first()->nama_unit ?? '-' }}
                </b>
            </div>
        @endif

        {{-- TABLE --}}
        <div class="overflow-x-auto rounded-xl border border-gray-200">
            <table class="w-full text-sm text-gray-700">
                <thead class="bg-gray-100 text-gray-600 text-xs uppercase">
                    <tr>
                        <th class="px-3 py-3 text-left">No</th>
                        <th class="px-3 py-3">NIP</th>
                        <th class="px-3 py-3">Nama</th>
                        <th class="px-3 py-3">Tempat Lahir</th>
                        <th class="px-3 py-3">Alamat</th>
                        <th class="px-3 py-3">Tanggal Lahir</th>
                        <th class="px-3 py-3">L/P</th>
                        <th class="px-3 py-3">Gol</th>
                        <th class="px-3 py-3">Eselon</th>
                        <th class="px-3 py-3">Jabatan</th>
                        <th class="px-3 py-3">Tempat Tugas</th>
                        <th class="px-3 py-3">Agama</th>
                        <th class="px-3 py-3">Unit Kerja</th>
                        <th class="px-3 py-3">No. HP</th>
                        <th class="px-3 py-3">NPWP</th>
                        <th class="px-3 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @php
                        $no = ($pegawai->currentPage() - 1) * $pegawai->perPage() + 1;
                    @endphp

                    @forelse($pegawai as $p)
                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-3 py-2">{{ $no++ }}</td>
                            <td class="px-3 py-2">{{ $p->nip }}</td>
                            <td class="px-3 py-2 font-medium">{{ $p->nama }}</td>
                            <td class="px-3 py-2">{{ $p->tempat_lahir ?? '-' }}</td>
                            <td class="px-3 py-2">{{ $p->alamat ?? '-' }}</td>

                            <td class="px-3 py-2">
                                {{ $p->tgl_lahir ? \Carbon\Carbon::parse($p->tgl_lahir)->format('d-m-Y') : '-' }}
                            </td>

                            <td class="px-3 py-2 text-center">
                                {{ $p->jenis_kelamin ?? '-' }}
                            </td>

                            <td class="px-3 py-2 text-center">
                                {{ $p->golongan->golongan ?? '-' }}
                            </td>

                            <td class="px-3 py-2 text-center">
                                {{ $p->eselon->nama_eselon ?? '-' }}
                            </td>

                            <td class="px-3 py-2">
                                {{ $p->jabatan->nama ?? '-' }}
                            </td>

                            <td class="px-3 py-2">
                                {{ $p->tempat_tugas ?? '-' }}
                            </td>

                            <td class="px-3 py-2 text-center">
                                {{ $p->agama->nama ?? '-' }}
                            </td>

                            <td class="px-3 py-2">
                                {{ $p->unitKerja->nama_unit ?? '-' }}
                            </td>

                            <td class="px-3 py-2">
                                {{ $p->no_hp ?? '-' }}
                            </td>

                            <td class="px-3 py-2">
                                {{ $p->npwp ?? '-' }}
                            </td>

                            {{-- AKSI --}}
                            <td class="px-3 py-2 text-center">
                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('pegawai.edit', $p->id) }}"
                                        class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-lg text-xs shadow">
                                        ✏️
                                    </a>

                                    <form method="POST" action="{{ route('pegawai.destroy', $p->id) }}">
                                        @csrf
                                        @method('DELETE')

                                        <button type="button"
                                            class="btn-delete bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-xs shadow">
                                            🗑
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>

                    @empty
                        <tr>
                            <td colspan="16" class="text-center py-6 text-gray-400">
                                Tidak ada data
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        <div class="mt-5">
            {{ $pegawai->appends(request()->query())->links('pagination::tailwind') }}
        </div>

    </div>
</div>

{{-- SWEETALERT --}}
<script>
document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function() {

        const form = this.closest('form');

        Swal.fire({
            title: 'Hapus data?',
            text: "Data tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#3b82f6',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });

    });
});
</script>

{{-- NOTIFIKASI SUCCESS --}}
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
    });
</script>
@endif

@endsection
