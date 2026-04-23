<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Daftar Pegawai</title>

    <style>
        /* ===== BASE ===== */
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            font-size: 10px;
            color: #111;
        }

        .container {
            width: 100%;
        }

        /* ===== HEADER ===== */
        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .title {
            font-size: 16px;
            font-weight: bold;
            margin: 0;
        }

        .subtitle {
            font-size: 11px;
            margin-top: 2px;
            color: #555;
        }

        /* ===== TABLE ===== */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 4px 6px;
            vertical-align: top;
        }

        th {
            background-color: #1e40af;
            color: #fff;
            text-align: center;
            font-weight: 600;
        }

        td {
            font-size: 10px;
        }

        tr:nth-child(even) {
            background-color: #f9fafb;
        }

        /* ===== ALIGNMENT ===== */
        .text-center { text-align: center; }
        .text-left { text-align: left; }

        /* ===== COLUMN WIDTH ===== */
        .col-no { width: 30px; }
        .col-nip { width: 120px; }
        .col-nama { width: 140px; }
        .col-small { width: 60px; }
        .col-alamat { width: 180px; }
        .col-jabatan { width: 200px; }

        /* ===== PRINT SETTING ===== */
        @media print {
            @page {
                size: A4 landscape;
                margin: 10mm;
            }

            body {
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>

<body onload="window.print()">

<div class="container">

    {{-- HEADER --}}
    <div class="header">
        <h1 class="title">DAFTAR PEGAWAI</h1>
        <p class="subtitle">PT. TRASPAC Makmur Sejahtera</p>
    </div>

    {{-- TABLE --}}
    <table>
        <thead>
            <tr>
                <th class="col-no">No</th>
                <th class="col-nip">NIP</th>
                <th class="col-nama">Nama</th>
                <th class="col-small">Tempat Lahir</th>
                <th class="col-alamat">Alamat</th>
                <th class="col-small">Tgl Lahir</th>
                <th class="col-small">L/P</th>
                <th class="col-small">Gol</th>
                <th class="col-small">Eselon</th>
                <th class="col-jabatan">Jabatan</th>
                <th class="col-small">Tempat Tugas</th>
                <th class="col-small">Agama</th>
                <th class="col-small">Unit</th>
                <th class="col-small">No HP</th>
                <th class="col-small">NPWP</th>
            </tr>
        </thead>

        <tbody>
            @forelse($pegawai as $i => $p)
                <tr>
                    <td class="text-center">{{ $i + 1 }}</td>

                    <td>{{ $p->nip }}</td>

                    <td>{{ $p->nama }}</td>

                    <td class="col-small">{{ $p->tempat_lahir ?? '-' }}</td>

                    <td class="col-alamat">{{ $p->alamat ?? '-' }}</td>

                    {{-- FORMAT TANGGAL --}}
                    <td class="text-center">
                        {{ $p->tgl_lahir ? \Carbon\Carbon::parse($p->tgl_lahir)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="text-center">
                        {{ $p->jenis_kelamin ?? '-' }}
                    </td>

                    <td class="text-center">
                        {{ $p->golongan->golongan ?? '-' }}
                    </td>

                    <td class="text-center">
                        {{ $p->eselon->nama_eselon ?? '-' }}
                    </td>

                    <td class="col-jabatan">
                        {{ $p->jabatan->nama ?? '-' }}
                    </td>

                    <td class="col-small">
                        {{ $p->tempat_tugas ?? '-' }}
                    </td>

                    <td class="text-center">
                        {{ $p->agama->nama ?? '-' }}
                    </td>

                    <td class="col-small">
                        {{ $p->unitKerja->nama_unit ?? '-' }}
                    </td>

                    <td class="col-small">
                        {{ $p->no_hp ?? '-' }}
                    </td>

                    <td class="col-small">
                        {{ $p->npwp ?? '-' }}
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="15" class="text-center">
                        Tidak ada data
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

</body>
</html>
