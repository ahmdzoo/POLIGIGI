<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pendaftaran Poli Gigi - Klinik Paoman</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; font-size: 9px; color: #333; line-height: 1.4; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #f97316; padding-bottom: 10px; }
        .header h2 { font-size: 16px; margin: 0; color: #f97316; text-transform: uppercase; letter-spacing: 1px; }
        .header h4 { font-size: 10px; margin: 5px 0 0; color: #666; font-weight: normal; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th { background-color: #fff7ed; color: #9a3412; border: 1px solid #fed7aa; padding: 8px; text-transform: uppercase; font-weight: bold; font-size: 8px; }
        td { border: 1px solid #eee; padding: 8px; vertical-align: top; }
        
        .text-center { text-align: center; }
        .font-bold { font-weight: bold; }
        .italic { font-style: italic; }
        .status-box { text-transform: uppercase; font-weight: bold; font-size: 7px; padding: 2px 5px; border-radius: 3px; }
        .footer { margin-top: 30px; float: right; width: 220px; text-align: center; font-size: 10px; }
        .meta { margin-top: 5px; font-size: 7px; color: #999; }
    </style>
</head>
<body>
    <div class="header">
        <h2>LAPORAN PENDAFTARAN PASIEN POLI GIGI</h2>
        <h4>KLINIK PAOMAN - KOTA MANGGA INDRAMAYU</h4>
        <div class="meta">Dicetak pada: {{ date('d F Y H:i:s') }} oleh Admin {{ Auth::user()->name }}</div>
    </div>
    
    <table>
        <thead>
            <tr>
                <th width="3%">No</th>
                <th width="22%">Identitas Pasien</th>
                <th width="15%">Dokter & Tanggal</th>
                <th width="28%">Layanan & Keluhan</th>
                <th width="12%">No Antrean</th>
                <th width="10%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registrations as $key => $reg)
            <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td>
                    <span class="font-bold" style="font-size: 10px; display: block; margin-bottom: 2px;">{{ strtoupper($reg->user->name) }}</span>
                    NIK: {{ $reg->user->nik }}<br>
                    WA: {{ $reg->no_hp }}
                </td>
                <td>
                    <span class="font-bold">{{ $reg->schedule->doctor->nama_dokter }}</span><br>
                    {{ \Carbon\Carbon::parse($reg->tgl_pendaftaran)->format('d/m/Y') }}
                </td>
                <td>
                    <span class="font-bold" style="color: #ea580c;">{{ strtoupper($reg->jenis_perawatan) }}</span><br>
                    <span class="italic text-gray-500">"{{ $reg->keluhan }}"</span>
                </td>
                <td class="text-center">
                    <span style="font-size: 14px; font-weight: bold; color: #f97316;">#{{ $reg->no_antrean }}</span><br>
                    {{ $reg->estimasi_jam }} WIB
                </td>
                <td class="text-center font-bold" style="text-transform: uppercase;">
                    {{ $reg->status }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="footer">
        Indramayu, {{ date('d F Y') }}<br>
        <strong>Admin Klinik Paoman</strong>
        <br><br><br><br><br>
        ( <strong>{{ Auth::user()->name }}</strong> )
    </div>
</body>
</html>