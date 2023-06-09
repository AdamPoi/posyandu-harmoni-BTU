<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Penimbangan</title>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Artikel</h4>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Balita</th>
                <th>Berat Badan</th>
                <th>Tinggi Badan</th>
                <th>Tanggal</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($penimbangans as $penimbangan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $penimbangan->balita->nama }}</td>
                    <td>{{ $penimbangan->berat_badan }}</td>
                    <td>{{ $penimbangan->tinggi_badan }}</td>
                    <td>{{ $penimbangan->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
