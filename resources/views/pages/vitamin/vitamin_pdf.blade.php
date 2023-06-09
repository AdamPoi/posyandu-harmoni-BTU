<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Data Vitamin</h4>
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
