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
        <h5>Laporan Data Vitamin Posyandu Harmoni - BTU</h4>
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
