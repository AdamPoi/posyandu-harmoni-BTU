<!DOCTYPE html>
<html>

<head>
    <title>Laporan PDF Data Pemeriksaan Posyandu Harmoni - BTU</title>
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
        <h5>Laporan Data Pemeriksaan Posyandu Harmoni - BTU</h4>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Id Pemeriksaan</th>
                <th>Nama Ibu Hamil</th>
                <th>Tanggal</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemeriksaans as $pemeriksaan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pemeriksaan->id_pemeriksaan }}</td>
                    <td>{{ $pemeriksaan->ibu_hamil->nama }}</td>
                    <td>{{ $pemeriksaan->tanggal }}</td>
                    <td>{{ $pemeriksaan->catatan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
