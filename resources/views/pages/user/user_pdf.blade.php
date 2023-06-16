<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data User Posyandu Harmoni - BTU</title>
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
            padding: 8px; /* Atur jarak pada teks dalam tabel */
        }

        .table .tanggal {
              text-align: left; /* Mengatur teks di sebelah kiri untuk kolom tanggal */
              white-space: nowrap; /* Mencegah pemutaran teks ke bawah (terlalu panjang) */
        }
    </style>
    <center>
        <h5>Laporan Data User Posyandu Harmoni - BTU</h4>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Usia</th>
                <th>Alamat</th>
                <th>Email</th>

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
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
