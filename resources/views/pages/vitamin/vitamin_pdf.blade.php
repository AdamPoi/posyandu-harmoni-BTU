<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Vitamin Posyandu Harmoni - BTU</title>
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
        <h2>Laporan Data Vitamin Posyandu Harmoni - BTU</h2>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Vitamin</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vitamins as $vitamin)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $vitamin->jenis_vitamin }}</td>
                    <td>{{ $vitamin->deskripsi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
