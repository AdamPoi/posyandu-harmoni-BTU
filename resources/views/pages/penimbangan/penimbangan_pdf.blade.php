<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Penimbangan Posyandu Harmoni - BTU</title>
</head>

<body>
    <style type="text/css">
        .table-bordered {
            border: 1px solid #000000;
            border-collapse: collapse;
            width: 100%;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #000000;
            text-align: left;
            padding: 8px;
            vertical-align: top;
        }

        .table .tanggal {
              text-align: left;
              white-space: nowrap;
        }
    </style>
    <center>
        <h2>Laporan Data Penimbangan Posyandu Harmoni - BTU</h2>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Balita</th>
                <th>Usia</th>
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
                    <td>{{ $penimbangan->balita->usia }}</td>
                    <td>{{ $penimbangan->berat_badan }}</td>
                    <td>{{ $penimbangan->tinggi_badan }}</td>
                    <td>{{ $penimbangan->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
