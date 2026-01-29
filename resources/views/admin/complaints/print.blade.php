<!DOCTYPE html>
<html>
<head>
    <title>Laporan Detail Pengaduan</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 1.2cm;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 8.5pt; /* Sedikit lebih kecil agar proposional di landscape */
            color: #333;
            line-height: 1.3;
        }

        /* Kop Laporan Profesional */
        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            margin-bottom: 15px;
            padding-bottom: 10px;
        }

        .header h1 { margin: 0; font-size: 16pt; color: #000; }
        .header p { margin: 2px 0; font-size: 9pt; }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; /* Kunci agar lebar kolom stabil */
        }

        th, td {
            border: 1px solid #444;
            padding: 8px 5px;
            word-wrap: break-word;
            vertical-align: top;
        }

        th {
            background-color: #f0f0f0;
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 8pt;
        }

        /* Penyesuaian Kolom */
        .col-no { width: 3%; }
        .col-date { width: 10%; }
        .col-title { width: 15%; }
        .col-reporter { width: 13%; }
        .col-location { width: 13%; }
        .col-content { width: 25%; }
        .col-image { width: 12%; }
        .col-status { width: 9%; }

        .text-center { text-align: center; }
        .font-bold { font-weight: bold; }
        
        .img-evidence {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .badge {
            display: inline-block;
            padding: 3px 5px;
            border: 1px solid #000;
            font-size: 7.5pt;
            font-weight: bold;
            text-transform: uppercase;
        }

        .footer-sign {
            margin-top: 30px;
            float: right;
            width: 250px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>LAPORAN DETAIL PENGADUAN MASYARAKAT</h1>
        <p>Desa Pasirpanjang Kec.Salem Kab.Brebes</p>
        <p><i>Laporan digenerate otomatis pada: {{ now()->format('d F Y, H:i') }}</i></p>
    </div>

    <table>
        <thead>
            <tr>
                <th class="col-no">No</th>
                <th class="col-date">Waktu Kejadian</th>
                <th class="col-title">Judul & Kategori</th>
                <th class="col-reporter">Data Pengadu</th>
                <th class="col-location">Lokasi</th>
                <th class="col-content">Isi Laporan</th>
                <th class="col-image">Bukti Foto</th>
                <th class="col-status">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($complaints as $complaint)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">
                        {{ \Carbon\Carbon::parse($complaint->incident_date)->format('d/m/Y') }}<br>
                        <small>{{ $complaint->incident_time }}</small>
                    </td>
                    <td>
                        <div class="font-bold">{{ $complaint->title }}</div>
                        <small style="color: #666;"> {{ $complaint->category }}</small>
                    </td>
                    <td>
                        {{ $complaint->reporter_name }}<br>
                        <small>{{ $complaint->phone }}</small>
                    </td>
                    <td>
                        {{ $complaint->incident_location }}<br>
                        <small>{{ $complaint->incident_place }}</small>
                    </td>
                    <td>{{ Str::limit($complaint->content, 150) }}</td>
                    <td class="text-center">
                        @if($complaint->evidence_file_path)
                            <img src="{{ public_path('storage/' . $complaint->evidence_file_path) }}" class="img-evidence">
                        @else
                            <small style="color: #999;">Tidak Ada<br>Bukti</small>
                        @endif
                    </td>
                    <td class="text-center">
                        <span class="badge">{{ $complaint->status }}</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer-sign">
        <p>Dicetak pada: {{ date('d/m/Y') }}</p>
        <p>Petugas Administrator,</p>
        <br><br><br>
        <p><strong>__________________________</strong></p>
       
    </div>

</body>
</html>