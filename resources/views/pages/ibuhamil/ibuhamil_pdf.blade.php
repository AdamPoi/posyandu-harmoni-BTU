<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Ibu Hamil Posyandu Harmoni - BTU</title>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Data Ibu Hamil Posyandu Harmoni - BTU</h4>
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
