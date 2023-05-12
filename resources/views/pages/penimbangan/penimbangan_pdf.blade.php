<!DOCTYPE html>
<html>

<head>
    <title>Laporan  Data Penimbangan</title>
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
            @foreach ($penimbangan as $pen)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pen->balita->nama }}</td>
                    <td>{{ $pen->berat_badan }}</td>
                    <td>{{ $pen->tinggi_badan }}</td>
                    <td>{{ $pen->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
