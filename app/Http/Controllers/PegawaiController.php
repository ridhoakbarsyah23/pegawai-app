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

        // 🔍 SEARCH
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('nip', 'like', '%' . $request->search . '%');
            });
        }

        // 🏢 FILTER
        if ($request->unit_kerja_id) {
            $query->where('unit_kerja_id', $request->unit_kerja_id);
        }

        $pegawai = $query->paginate(10);
        $unitKerja = UnitKerja::all();

        return view('pegawai.index', compact('pegawai', 'unitKerja'));
    }

    // ➕ FORM TAMBAH
    public function create()
    {
        return view('pegawai.create', [
            'agama'        => Agama::select('id', 'nama')->get(),
            'unitKerja'    => UnitKerja::select('id', 'nama_unit')->get(),
            'jabatan'      => Jabatan::all(),
            'golongan'     => Golongan::select('id', 'golongan')->get(),
            'eselon'       => Eselon::select('id', 'nama_eselon')->get(),
            'jenisKelamin' => ['L' => 'Laki-laki', 'P' => 'Perempuan'],
        ]);
    }

    // 💾 SIMPAN
    public function store(Request $request)
    {
        $request->validate([
            // ✅ WAJIB
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'golongan_id' => 'required',
            'agama_id' => 'required',

            // ❌ OPSIONAL
            'nip' => 'nullable|unique:pegawais,nip',
            'nama' => 'nullable',
            'tempat_lahir' => 'nullable',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
            'npwp' => 'nullable',
            'tempat_tugas' => 'nullable',
            'unit_kerja_id' => 'nullable',
            'jabatan_id' => 'nullable',
            'eselon_id' => 'nullable',

            // 📸 FOTO
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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

        // 📸 Upload Foto (opsional)
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

    // ✏️ FORM EDIT
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

    // 🔄 UPDATE
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $validated = $request->validate([
            // ✅ WAJIB
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'golongan_id' => 'required',
            'agama_id' => 'required',

            // ❌ OPSIONAL
            'nip' => 'nullable|unique:pegawais,nip,' . $id,
            'nama' => 'nullable',
            'tempat_lahir' => 'nullable',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
            'npwp' => 'nullable',
            'tempat_tugas' => 'nullable',
            'unit_kerja_id' => 'nullable',
            'jabatan_id' => 'nullable',
            'eselon_id' => 'nullable',

            // 📸 FOTO
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $validated;

        // 📸 Update Foto
        if ($request->hasFile('foto')) {

            if ($pegawai->foto && file_exists(public_path('foto/' . $pegawai->foto))) {
                unlink(public_path('foto/' . $pegawai->foto));
            }

            $file = $request->file('foto');
            $namaFile = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('foto'), $namaFile);

            $data['foto'] = $namaFile;
        }

        $pegawai->update($data);

        return redirect()->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil diperbarui');
    }

    // ❌ DELETE
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        if ($pegawai->foto && file_exists(public_path('foto/' . $pegawai->foto))) {
            unlink(public_path('foto/' . $pegawai->foto));
        }

        $pegawai->delete();

        return redirect()->route('pegawai.index')
            ->with('success', 'Data berhasil dihapus');
    }

    // 🖨️ CETAK
    public function cetak()
    {
        $pegawai = Pegawai::with([
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
