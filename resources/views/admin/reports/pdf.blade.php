<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pendaftaran Poli Gigi</title>
    <style>
        body { font-family: sans-serif; font-size: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 5px; text-align: left; vertical-align: top; }
        th { background-color: #f2f2f2; text-transform: uppercase; }
        h2, h4 { text-align: center; margin: 0; padding: 0; }
        .text-center { text-align: center; }
        .status { text-transform: uppercase; font-weight: bold; }
    </style>
</head>
<body>
    <h2>LAPORAN PENDAFTARAN PASIEN POLI GIGI</h2>
    <h4>KLINIK PAOMAN - INDRAMAYU</h4>
    <hr>
    
    <table>
        <thead>
            <tr>
                <th width="3%">No</th>
                <th width="20%">Data Pasien (NIK & WA)</th>
                <th width="15%">Dokter</th>
                <th width="12%">Tgl Periksa</th>
                <th width="25%">Layanan & Keluhan</th>
                <th width="10%">Jam / No</th>
                <th width="15%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registrations as $key => $reg)
            <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td>
                    <b>{{ $reg->user->name }}</b><br>
                    NIK: {{ $reg->user->nik }}<br>
                    HP: {{ $reg->no_hp }}
                </td>
                <td>{{ $reg->schedule->doctor->nama_dokter }}</td>
                <td>{{ \Carbon\Carbon::parse($reg->tgl_pendaftaran)->format('d-m-Y') }}</td>
                <td>
                    <b>{{ $reg->jenis_perawatan }}</b><br>
                    <i>"{{ $reg->keluhan }}"</i>
                </td>
                <td class="text-center">
                    #{{ $reg->no_antrean }}<br>
                    {{ $reg->estimasi_jam }}
                </td>
                <td class="text-center status">{{ $reg->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div style="margin-top: 20px; float: right; width: 200px; text-align: center;">
        Indramayu, {{ date('d F Y') }}<br>
        Admin Klinik Paoman<br><br><br><br>
        (................................)
    </div>
</body>
</html>