<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Agama;
use App\Models\UnitKerja;
use App\Models\Jabatan;
use App\Models\Golongan;
use App\Models\Eselon;

class PegawaiController extends Controller
{
    // 📋 LIST + SEARCH + FILTER
    public function index(Request $request)
    {
        $query = Pegawai::with([
            'agama',
            'unitKerja',
            'jabatan',
            'golongan',
            'eselon'
        ]);

        // 🔍 SEARCH (nama / nip)
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                    ->orWhere('nip', 'like', '%' . $request->search . '%');
            });
        }

        // 🏢 FILTER UNIT KERJA
        if ($request->unit_kerja_id) {
            $query->where('unit_kerja_id', $request->unit_kerja_id);
        }

        $pegawai = $query->paginate(10);
        $unitKerja = UnitKerja::all();

        return view('pegawai.index', compact('pegawai', 'unitKerja'));
    }

    // ➕ FORM TAMBAH DATA PEGAWAI
    public function create()
    {
        return view('pegawai.create', [
            'agama'        => Agama::select('id', 'nama')->distinct()->get(),
            'unitKerja'    => UnitKerja::select('id', 'nama_unit')->distinct()->get(),
            'jabatan'      => Jabatan::all(),
            'golongan'     => Golongan::select('id', 'golongan')->distinct()->get(),
            'eselon'       => Eselon::select('id', 'nama_eselon')->distinct()->get(),
            'jenisKelamin' => ['L' => 'Laki-laki', 'P' => 'Perempuan'],
        ]);
    }

    // 💾 SIMPAN DATA PEGAWAI
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:pegawais',
            'nama' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'npwp' => 'required',
            'tempat_tugas' => 'required',
        ]);

        $data = $request->only([
            'nip',
            'nama',
            'jabatan_id',
            'golongan_id',
            'eselon_id',
            'agama_id',
            'unit_kerja_id',
            'tgl_lahir',
            'jenis_kelamin',
            'tempat_lahir',
            'alamat',
            'no_hp',
            'npwp',
            'tempat_tugas',
            
        ]);


        // 📸 Upload Foto 
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('foto'), $namaFile);
            $data['foto'] = $namaFile;
        }

        Pegawai::create($data);

        return redirect()->route('pegawai.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    // ✏️ FORM EDIT PEGAWAI
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        return view('pegawai.edit', [
            'pegawai' => $pegawai,
            'agama' => Agama::all(),
            'unitKerja' => UnitKerja::all(),
            'jabatan' => Jabatan::all(),
            'golongan' => Golongan::all(),
            'eselon' => Eselon::all(),
        ]);
    }

    // 🔄 UPDATE DATA PEGAWAI
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        // VALIDASI
        $validated = $request->validate([
            'nip' => 'required|unique:pegawais,nip,' . $id,
            'nama' => 'required',
            'tempat_lahir' => 'nullable',
            'tgl_lahir' => 'nullable|date',
            'alamat' => 'nullable',
            'jenis_kelamin' => 'nullable',
            'no_hp' => 'nullable',
            'npwp' => 'nullable',
            'tempat_tugas' => 'nullable',
        ]);

        // AMBIL DATA YANG AKAN DIUPDATE
        $data = $validated;

        // 📸 UPDATE FOTO
        if ($request->hasFile('foto')) {

            // hapus foto lama jika ada
            if ($pegawai->foto && file_exists(public_path('foto/' . $pegawai->foto))) {
                unlink(public_path('foto/' . $pegawai->foto));
            }

            $file = $request->file('foto');
            $namaFile = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('foto'), $namaFile);

            $data['foto'] = $namaFile;
        }

        // UPDATE DATA PEGAWAI
        $pegawai->update($data);

        return redirect()
            ->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil diperbarui');
    }

    // ❌ HAPUS DATA PEGAWAI
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return redirect()->route('pegawai.index')
            ->with('success', 'Data berhasil dihapus');
    }

    // 🖨️ CETAK DATA PEAGWAI
    public function cetak()
    {
        $pegawai = \App\Models\Pegawai::with([
            'golongan',
            'eselon',
            'jabatan',
            'agama',
            'unitKerja'
        ])->get();

        return view('pegawai.cetak', compact('pegawai'));
    }

    public function show($id)
    {
        return redirect()->route('pegawai.index');
    }
}
