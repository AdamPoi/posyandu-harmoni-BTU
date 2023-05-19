<!DOCTYPE html>
<html>
<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
</head>
<body>
    <style type="text/css">
        table tr td,
        table tr th{
                font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Data Imunnisasi Posyandu Harmoni -BTU</h4>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Balita</th>
                <th>Jenis Imunisasi</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($imunisasi as $a)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$a->balita->nama}}</td>
                <td>{{$a->jenis_imunisasi}}</td>
                <td>{{$a->tanggal}}</td>
                <td>{{$a->deskripsi}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>