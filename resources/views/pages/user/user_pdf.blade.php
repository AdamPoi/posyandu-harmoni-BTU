<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Penimbangan</title>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Artikel</h4>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Usia</th>
                <th>Alamat</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->usia }}</td>
                    <td>{{ $user->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
