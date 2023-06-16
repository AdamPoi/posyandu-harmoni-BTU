<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Balita Posyandu Harmoni - BTU</title>
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
            text-align: center;
            padding: 8px;
        }
        
        .table .tanggal {
            text-align: left;
            white-space: nowrap;
        }
    </style>
    
    <center>
        <h2>Laporan Data Balita Posyandu Harmoni - BTU</h2>
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
                    <td>{{ $balita->ibu_hamil->nama }}</td>
                    <td>{{ $balita->usia }}</td>
                    <td>{{ $balita->jenis_kelamin }}</td>
                    <td>{{ $balita->tanggal_lahir }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
