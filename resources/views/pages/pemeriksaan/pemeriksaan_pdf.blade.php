<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Data Pemeriksaan</h4>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Id Pemeriksaan</th>
                <th>Nama Ibu Hamil</th>
                <th>Tanggal</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemeriksaans as $pemeriksaan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pemeriksaan->id_pemeriksaan }}</td>
                    <td>{{ $pemeriksaan->ibu_hamil->nama }}</td>
                    <td>{{ $pemeriksaan->tanggal }}</td>
                    <td>{{ $pemeriksaan->catatan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
