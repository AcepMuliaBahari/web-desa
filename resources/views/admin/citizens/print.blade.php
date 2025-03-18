<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Data Penduduk</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            line-height: 1.3;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 3px;
        }

        .header p {
            font-size: 12px;
        }

        .date {
            text-align: right;
            margin: 10px 0;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            page-break-inside: auto;
        }

        /* Mengatur header tabel agar berulang di setiap halaman */
        thead {
            display: table-header-group;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        th, td {
            border: 0.5px solid #000;
            padding: 4px;
            text-align: left;
            font-size: 9px;
            vertical-align: top;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        /* Mengatur lebar kolom */
        .w-nik { width: 10%; }
        .w-nokk { width: 10%; }
        .w-nama { width: 10%; }
        .w-ttl { width: 10%; }
        .w-jk { width: 2%; }
        .w-alamat { width: 13%; }
        .w-rtrw { width: 3%; }
        .w-agama { width: 4%; }
        .w-status { width: 6%; }
        .w-pekerjaan { width: 8%; }
        .w-warga { width: 2%; }
        .w-pendidikan { width: 4%; }

        /* Styling untuk nomor halaman */
        .page-number {
            text-align: right;
            font-size: 9px;
            position: running(pageNumber);
        }

        @page {
            margin: 20px;
            size: landscape;
            @bottom-right {
                content: "Halaman " counter(page) " dari " counter(pages);
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>DATA PENDUDUK DESA</h1>
        <p>{{ config('app.name') }}</p>
    </div>

    <div class="date">
        Tanggal Cetak: {{ now()->translatedFormat('d F Y') }}
    </div>

    <table>
        <thead>
            <tr>
                <th class="w-nik">NIK</th>
                <th class="w-nokk">No. KK</th>
                <th class="w-nama">Nama</th>
                <th class="w-ttl">Tenpat tanggal lahir</th>
                <th class="w-jk">Jenis Kelamin</th>
                <th class="w-alamat">Alamat</th>
                <th class="w-rtrw">RT/RW</th>
                <th class="w-agama">Agama</th>
                <th class="w-status">Status Perkawinan</th>
                <th class="w-pekerjaan">Pekerjaan</th>
                {{-- <th class="w-warga">WN</th> --}}
                <th class="w-pendidikan">Pendidikan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($citizens as $citizen)
            <tr>
                <td>{{ $citizen->nik }}</td>
                <td>{{ $citizen->no_kk }}</td>
                <td>{{ $citizen->name }}</td>
                <td>{{ $citizen->tempat_lahir }}, {{ $citizen->tanggal_lahir->format('d/m/Y') }}</td>
                <td>{{ $citizen->jenis_kelamin }}</td>
                <td>{{ $citizen->alamat }}</td>
                <td>{{ $citizen->rt }}/{{ $citizen->rw }}</td>
                <td>{{ $citizen->agama }}</td>
                <td>{{ $citizen->status_perkawinan }}</td>
                <td>{{ $citizen->pekerjaan }}</td>
                {{-- <td>{{ $citizen->kewarganegaraan }}</td> --}}
                <td>{{ $citizen->pendidikan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 