<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Ibu Hamil Posyandu Harmoni - BTU</title>
</head>

<body>
    <style type="text/css">
        .table-bordered {
            border: 1px solid #000000;
            border-collapse: collapse;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #000000;
            text-align: center;
            padding: 8px;
        }

        .table .tanggal {
              text-align: left;
              white-space: nowrap;
        }
    </style>
    <center>
        <h2>Laporan Data Ibu Hamil Posyandu Harmoni - BTU</h2>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Usia Kandungan</th>
                <th>Tanggal Hamil</th>
                <th>Tanggal Lahir</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($ibuhamils as $ibuhamil)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ibuhamil->nama }}</td>
                    <td>{{ $ibuhamil->alamat }}</td>
                    <td>{{ $ibuhamil->no_telepon }}</td>
                    <td>{{ $ibuhamil->usia_kandungan }}</td>
                    <td>{{ $ibuhamil->tanggal_hamil }}</td>
                    <td>{{ $ibuhamil->tanggal_lahir }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
