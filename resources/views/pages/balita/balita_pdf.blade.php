<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Balita Posyandu Harmoni - BTU</title>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Data Balita Posyandu Harmoni - BTU</h4>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <th>Usia</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($balitas as $balita)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $balita->nama }}</td>
                    <td>{{ $balita->nama_ayah }}</td>
                    <td>{{ $balita->nama_ibu }}</td>
                    <td>{{ $balita->usia }}</td>
                    <td>{{ $balita->jenis_kelamin }}</td>
                    <td>{{ $balita->tanggal_lahir }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
