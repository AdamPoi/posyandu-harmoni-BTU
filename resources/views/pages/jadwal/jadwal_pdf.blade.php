<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Jadwal Posyandu Harmoni - BTU</title>
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
        <h2>Laporan Data Jadwal Posyandu Harmoni - BTU</h2>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Kegiatan</th>
                <th>Jenis Kegiatan</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwals as $jadwal)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $jadwal->kegiatan }}</td>
                    <td>{{ $jadwal->jenis }}</td>
                    <td>{{ $jadwal->tanggal }}</td>
                    <td>{{ $jadwal->deskripsi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
