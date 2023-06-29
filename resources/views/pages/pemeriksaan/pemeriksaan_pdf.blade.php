<!DOCTYPE html>
<html>

<head>
    <title>Laporan PDF Data Pemeriksaan Posyandu Harmoni - BTU</title>
</head>

<body>
    <style>
        .table-bordered {
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
        <h2>Laporan Data Pemeriksaan Posyandu Harmoni - BTU</h2>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ibu Hamil</th>
                <th>Tanggal</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemeriksaans as $pemeriksaan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pemeriksaan->ibu_hamil->nama }}</td>
                    <td>{{ $pemeriksaan->tanggal }}</td>
                    <td>{{ $pemeriksaan->catatan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
